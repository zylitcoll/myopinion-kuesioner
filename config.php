<?php
// config.php

// Dapatkan string koneksi dari variabel lingkungan
$conn_string = getenv('DATABASE_URL');

if (!$conn_string) {
    die("Error: DATABASE_URL environment variable is not set.");
}

try {
    // Parse string koneksi untuk mendapatkan detail yang diperlukan oleh PDO
    $url = parse_url($conn_string);
    $dsn = sprintf(
        "pgsql:host=%s;dbname=%s;user=%s;password=%s",
        $url['host'],
        ltrim($url['path'], '/'),
        $url['user'],
        $url['pass']
    );

    // Buat koneksi ke database PostgreSQL
    $pdo = new PDO($dsn);

    // Setel mode error untuk menampilkan exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Setel mode pengambilan data default ke array asosiatif
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Koneksi ke database PostgreSQL gagal: " . $e->getMessage());
}
?>