<?php
// controllers/InputController.php
require_once 'models/DataModel.php';

function handle_input_form($pdo) {
    $dataModel = new DataModel($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $required_fields = ["responden", "email", "p1", "p2", "p3", "p4", "p5", "p6", "p7", "p8", "p9"];
        $errors = [];
        $data = [];

        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                if (substr($field, 0, 1) === 'p') {
                    $errors[] = "Jawaban untuk pertanyaan nomor " . substr($field, 1) . " wajib diisi.";
                } else {
                    $errors[] = "Kolom " . ucfirst($field) . " wajib diisi.";
                }
            } else {
                $data[$field] = $_POST[$field];
            }
        }

        if (empty($errors)) {
            $success = $dataModel->save_kuisioner_data($data);
            
            if ($success) {
                header('Location: index.php?page=berhasil');
                exit;
            } else {
                if (isset($_SESSION['database_error'])) {
                    $_SESSION['input_error'] = "<strong>Detail Error Database:</strong><br><pre>" . htmlspecialchars($_SESSION['database_error']) . "</pre>";
                    unset($_SESSION['database_error']);
                } else {
                    $_SESSION['input_error'] = "Terjadi kesalahan tidak diketahui saat menyimpan data.";
                }
            }
        } else {
            $_SESSION['input_error'] = "<strong>Formulir tidak lengkap:</strong><br>" . implode("<br>", $errors);
        }
        
        header('Location: index.php?page=input');
        exit;
    }

    $pertanyaan = $dataModel->get_pertanyaan_for_input();
    require 'views/input.php';
}
?>