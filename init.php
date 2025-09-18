<?php
// init.php
// Skrip ini dijalankan sekali untuk membuat dan mengisi database SQLite.

$db_file = __DIR__ . '/database/myopinion.db';

// Jangan jalankan lagi jika database sudah ada
if (file_exists($db_file)) {
    echo "Database sudah ada. Inisialisasi tidak diperlukan.\n";
    return;
}

try {
    // Hubungkan ke database (ini akan membuat file .db)
    $pdo = new PDO('sqlite:' . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "File database myopinion.db berhasil dibuat.\n";
    
    // Perintah SQL untuk membuat tabel (disesuaikan untuk SQLite)
    $sql = "
    CREATE TABLE `t_kuisioner` (
      `id` INTEGER PRIMARY KEY AUTOINCREMENT,
      `responden` varchar(250) NOT NULL,
      `email` varchar(255) NOT NULL,
      `p1` varchar(500) NOT NULL,
      `p2` varchar(500) NOT NULL,
      `p3` varchar(500) NOT NULL,
      `p4` varchar(500) NOT NULL,
      `p5` varchar(500) NOT NULL,
      `p6` varchar(255) DEFAULT NULL,
      `p7` varchar(255) DEFAULT NULL,
      `p8` varchar(255) DEFAULT NULL,
      `p9` varchar(255) DEFAULT NULL
    );

    CREATE TABLE `t_pertanyaan` (
      `id` INTEGER PRIMARY KEY AUTOINCREMENT,
      `pertanyaan` varchar(500) NOT NULL,
      `isi1` varchar(500) NOT NULL,
      `isi2` varchar(500) NOT NULL,
      `isi3` varchar(500) NOT NULL,
      `isi4` varchar(500) NOT NULL
    );

    CREATE TABLE `t_user` (
      `id` int(11) NOT NULL,
      `nama_user` varchar(250) NOT NULL,
      `password` varchar(250) NOT NULL
    );
    
    INSERT INTO `t_pertanyaan` (`id`, `pertanyaan`, `isi1`, `isi2`, `isi3`, `isi4`) VALUES
    (1, 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (2, 'Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan di unit ini?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (3, 'Bagaimana pendapat saudara tentang kecepatan waktu dalam memberikan pelayanan?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (4, 'Bagaimana pendapat saudara tentang kewajaran biaya/tarif dalam pelayanan?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (5, 'Bagaimana pendapat saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (6, 'Bagaimana pendapat saudara tentang kompetensi/kemampuan petugas dalam pelayanan?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (7, 'Bagaimana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (8, 'Bagaimana pendapat saudara tentang kualitas sarana dan prasarana?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk'),
    (9, 'Bagaimana pendapat anda tentang ketepatan penyelesaian pelayanan terhadap janji waktu pelayanan ?', 'Sangat Baik', 'Baik', 'Cukup', 'Buruk');

    INSERT INTO `t_user` (`id`, `nama_user`, `password`) VALUES
    (1, 'admin', 'admin');
    ";
    
    // Eksekusi semua perintah SQL
    $pdo->exec($sql);
    
    echo "Tabel berhasil dibuat dan data awal berhasil dimasukkan.\n";

} catch (PDOException $e) {
    die("Gagal menginisialisasi database: " . $e->getMessage());
}
?>