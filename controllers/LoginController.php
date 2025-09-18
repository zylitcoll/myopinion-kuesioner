<?php
// controllers/LoginController.php
require_once 'models/UserModel.php';

function handle_login($pdo) {
    // Jika admin mencoba login (mengirim data via POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['nama_user'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel($pdo);
        $user = $userModel->verify_login($username, $password);

        if ($user) {
            // Jika login berhasil, buat session untuk admin
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_name'] = $user['nama_user'];
            $_SESSION['status'] = "login"; // Menjaga konsistensi dengan kode lama

            header('Location: index.php?page=admin'); // Arahkan ke dashboard
            exit;
        } else {
            // Jika gagal, kirim pesan error dan kembali ke halaman login
            $_SESSION['login_error'] = "Username atau Password salah!";
            header('Location: index.php?page=login');
            exit;
        }
    }

    // Jika belum login atau akses halaman login, tampilkan view login
    require 'views/login.php';
}

function handle_logout() {
    session_unset();
    session_destroy();
    header('Location: index.php?page=login');
    exit;
}
?>