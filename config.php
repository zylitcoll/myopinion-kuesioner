<?php
// config.php

// Dapatkan string koneksi dari variabel lingkungan
$conn_string = getenv('DATABASE_URL');

if (!$conn_string) {
    die("Error: DATABASE_URL environment variable is not set.");
}

try {
    // Memecah string koneksi menjadi bagian-bagian yang relevan
    // Menggunakan regex untuk penanganan yang lebih andal
    preg_match(
        '/^postgresql:\/\/([^:]+):([^@]+)@([^\/]+)\/(.+?)\?/',
        $conn_string,
        $matches
    );

    if (count($matches) < 5) {
        die("Error: Invalid DATABASE_URL format.");
    }
    
    $user = $matches[1];
    $password = $matches[2];
    $host = $matches[3];
    $dbname = $matches[4];

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