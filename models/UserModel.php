<?php
// models/UserModel.php

class UserModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Memverifikasi login admin.
     * Nama fungsi ini diubah dari 'authenticate' menjadi 'verify_login' untuk memperbaiki error.
     * PERINGATAN: Menyimpan password sebagai teks biasa sangat tidak aman.
     */
    public function verify_login($username, $password) {
        // Query disiapkan untuk keamanan
        $sql = "SELECT * FROM t_user WHERE nama_user = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        
        // Mengembalikan data user jika ditemukan, jika tidak, mengembalikan false.
        return $stmt->fetch(); 
    }
}
?>