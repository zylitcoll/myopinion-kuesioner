<?php
// controllers/AdminController.php
require_once 'models/DataModel.php';

/**
 * Fungsi ini adalah "gerbang" untuk semua halaman admin.
 * Memeriksa apakah admin sudah login sebelum melanjutkan.
 */
function check_admin_auth() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: index.php?page=login');
        exit;
    }
}

/**
 * Menampilkan halaman dashboard utama admin.
 */
function show_dashboard($pdo) {
    check_admin_auth(); // Proteksi halaman

    $dataModel = new DataModel($pdo);
    
    $total_pertanyaan = $dataModel->count_total_pertanyaan();
    $total_responden = $dataModel->count_total_responden();
    
    // Kirim data ke view
    require 'views/admin.php';
}

// --- FUNGSI YANG HILANG & DIPERBAIKI ---
/**
 * Menampilkan data tabel pertanyaan.
 */
function show_data_pertanyaan($pdo) {
    check_admin_auth();

    $dataModel = new DataModel($pdo);
    $pertanyaan = $dataModel->get_all_pertanyaan();

    require 'views/admin_pertanyaan.php';
}
// --- BATAS FUNGSI YANG HILANG ---


/**
 * Menampilkan data tabel responden.
 */
function show_data_responden($pdo) {
    check_admin_auth();

    $dataModel = new DataModel($pdo);
    $responden = $dataModel->get_all_kuisioner_results();

    require 'views/admin_responden.php';
}

function show_print_responden($pdo) {
    check_admin_auth(); // Pastikan admin sudah login
    $dataModel = new DataModel($pdo);
    $responden = $dataModel->get_all_kuisioner_results(); // Ambil semua data responden
    
    // Panggil view khusus untuk mencetak
    require 'views/print_responden.php';
}
// --- FUNGSI UNTUK CRUD & PRINT ---

function handle_tambah_pertanyaan($pdo) {
    check_admin_auth();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dataModel = new DataModel($pdo);
        $dataModel->insert_pertanyaan($_POST);
        header('Location: index.php?page=data_pertanyaan');
        exit;
    }
    // Jika GET, tampilkan form
    $page_title = "Tambah Pertanyaan";
    require 'views/form_pertanyaan.php';
}

function handle_edit_pertanyaan($pdo) {
    check_admin_auth();
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: index.php?page=data_pertanyaan');
        exit;
    }

    $dataModel = new DataModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dataModel->update_pertanyaan($id, $_POST);
        header('Location: index.php?page=data_pertanyaan');
        exit;
    }
    // Jika GET, ambil data dan tampilkan form
    $pertanyaan = $dataModel->get_pertanyaan_by_id($id);
    $page_title = "Edit Pertanyaan";
    require 'views/form_pertanyaan.php';
}

function handle_hapus_pertanyaan($pdo) {
    check_admin_auth();
    $id = $_GET['id'] ?? null;
    if ($id) {
        $dataModel = new DataModel($pdo);
        $dataModel->delete_pertanyaan($id);
    }
    header('Location: index.php?page=data_pertanyaan');
    exit;
}

function show_print_pertanyaan($pdo) {
    check_admin_auth();
    $dataModel = new DataModel($pdo);
    $pertanyaan = $dataModel->get_all_pertanyaan();
    require 'views/print_pertanyaan.php';
}

/**
 * Menampilkan dan menghitung hasil kuesioner.
 */
function show_hasil_kuesioner($pdo) {
    check_admin_auth();

    $dataModel = new DataModel($pdo);
    $semua_pertanyaan = $dataModel->get_all_pertanyaan();
    $hasil_kuisioner = $dataModel->get_all_kuisioner_results();
    $jumlah_responden = count($hasil_kuisioner);
    $jumlah_pertanyaan = count($semua_pertanyaan);

    $skor_map = ['Sangat Baik' => 4, 'Baik' => 3, 'Cukup' => 2, 'Buruk' => 1];
    $skala_maksimum = 4;
    $total_skor_per_pertanyaan = [];

    // Inisialisasi total skor untuk setiap pertanyaan yang ada
    foreach ($semua_pertanyaan as $p) {
        $total_skor_per_pertanyaan[$p['id']] = 0;
    }
    
    foreach ($hasil_kuisioner as $respon) {
        for ($i = 1; $i <= 9; $i++) { // Diasumsikan ada 9 pertanyaan p1-p9
            $kolom = 'p' . $i;
            if (isset($respon[$kolom]) && isset($skor_map[$respon[$kolom]])) {
                if (isset($total_skor_per_pertanyaan[$i])) {
                     $total_skor_per_pertanyaan[$i] += $skor_map[$respon[$kolom]];
                }
            }
        }
    }
    
    $mss_per_pertanyaan = [];
    $total_mss = 0;
    if ($jumlah_responden > 0) {
        foreach ($total_skor_per_pertanyaan as $id_pertanyaan => $total_skor) {
            $mean = $total_skor / $jumlah_responden;
            $mss_per_pertanyaan[$id_pertanyaan] = $mean;
            $total_mss += $mean;
        }
    }

    $csi = 0;
    if ($jumlah_pertanyaan > 0) {
        $csi = ($total_mss / ($jumlah_pertanyaan * $skala_maksimum)) * 100;
    }

    require 'views/hasil.php';
}
?>