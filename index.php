<?php
// index.php
session_start();
require_once 'config.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Sistem routing yang lebih andal
switch ($page) {
    // --- Rute Publik ---
    case 'home':
        require_once 'controllers/HomeController.php';
        show_home_page();
        break;
    case 'input':
        require_once 'controllers/InputController.php';
        handle_input_form($pdo);
        break;
    case 'berhasil':
        require 'views/berhasil.php';
        break;

    // --- Rute Login & Logout ---
    case 'login':
        require_once 'controllers/LoginController.php';
        handle_login($pdo);
        break;
    case 'logout':
        require_once 'controllers/LoginController.php';
        handle_logout();
        break;

    // --- Rute Admin ---
    case 'admin':
        require_once 'controllers/AdminController.php';
        show_dashboard($pdo);
        break;
    case 'data_pertanyaan':
        require_once 'controllers/AdminController.php';
        show_data_pertanyaan($pdo);
        break;
    case 'tambah_pertanyaan':
        require_once 'controllers/AdminController.php';
        handle_tambah_pertanyaan($pdo);
        break;
    case 'edit_pertanyaan':
        require_once 'controllers/AdminController.php';
        handle_edit_pertanyaan($pdo);
        break;
    case 'hapus_pertanyaan':
        require_once 'controllers/AdminController.php';
        handle_hapus_pertanyaan($pdo);
        break;
    case 'print_pertanyaan':
        require_once 'controllers/AdminController.php';
        show_print_pertanyaan($pdo);
        break;
    case 'data_responden':
        require_once 'controllers/AdminController.php';
        show_data_responden($pdo);
        break;
    case 'hasil':
        require_once 'controllers/AdminController.php';
        show_hasil_kuesioner($pdo);
        break;

    case 'print_responden':
        require_once 'controllers/AdminController.php';
        show_print_responden($pdo);
        break;


    // --- Halaman Default ---
    default:
        // Jika halaman tidak ditemukan, tampilkan halaman home
        require_once 'controllers/HomeController.php';
        show_home_page();
        break;
}
?>