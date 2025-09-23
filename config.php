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

    // Ambil nilai dari array yang dihasilkan
    $host = $url['host'];
    $dbname = ltrim($url['path'], '/');
    $user = $url['user'];
    $password = $url['pass'];
    
    // Buat DSN (Data Source Name)
    $dsn = "pgsql:host={$host};dbname={$dbname};user={$user};password={$password}";
    
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