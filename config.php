<?php
// config.php

// Tentukan path untuk file database SQLite
$db_path = __DIR__ . '/database/myopinion.db';

try {
    // Buat koneksi ke database SQLite menggunakan PDO
    // Database akan dibuat secara otomatis jika belum ada.
    $pdo = new PDO('sqlite:' . $db_path);
    
    // Setel mode error untuk menampilkan exception jika terjadi kesalahan
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Setel mode pengambilan data default ke array asosiatif
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Hentikan aplikasi dan tampilkan pesan jika koneksi gagal
    die("Koneksi ke database SQLite gagal: " . $e->getMessage());
}
?>