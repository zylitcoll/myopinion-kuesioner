<?php
// models/UserModel.php

class UserModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Memverifikasi login admin.
     * PERINGATAN: Menyimpan password sebagai teks biasa sangat tidak aman.
     * Sebaiknya gunakan password_hash() dan password_verify().
     */
    public function verify_login($username, $password) {
        $sql = "SELECT * FROM t_user WHERE nama_user = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        
        // Mengembalikan data user jika ditemukan, jika tidak, mengembalikan false.
        return $stmt->fetch(); 
    }
}
?>