<?php
// models/DataModel.php

class DataModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save_kuisioner_data($data) {
        $sql = "INSERT INTO t_kuisioner (responden, email, p1, p2, p3, p4, p5, p6, p7, p8, p9) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute([
                $data['responden'], $data['email'],
                $data['p1'], $data['p2'], $data['p3'],
                $data['p4'], $data['p5'], $data['p6'],
                $data['p7'], $data['p8'], $data['p9']
            ]);
            
            return true;
        } catch (PDOException $e) {
            $_SESSION['database_error'] = $e->getMessage();
            return false;
        }
    }
    
    // ... (sisa fungsi lainnya)
    public function get_pertanyaan_for_input() {
        $stmt = $this->pdo->query("SELECT * FROM t_pertanyaan ORDER BY id ASC");
        return $stmt->fetchAll();
    }
    public function get_all_kuisioner_results() {
        $stmt = $this->pdo->query("SELECT * FROM t_kuisioner");
        return $stmt->fetchAll();
    }
    public function get_all_pertanyaan() {
        $stmt = $this->pdo->query("SELECT * FROM t_pertanyaan");
        return $stmt->fetchAll();
    }
    public function count_total_pertanyaan() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM t_pertanyaan");
        return $stmt->fetchColumn();
    }
    public function count_total_responden() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM t_kuisioner");
        return $stmt->fetchColumn();
    }
    public function get_pertanyaan_by_id($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM t_pertanyaan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function insert_pertanyaan($data) {
        $sql = "INSERT INTO t_pertanyaan (pertanyaan, isi1, isi2, isi3, isi4) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$data['pertanyaan'], $data['isi1'], $data['isi2'], $data['isi3'], $data['isi4']]);
    }
    public function update_pertanyaan($id, $data) {
        $sql = "UPDATE t_pertanyaan SET pertanyaan = ?, isi1 = ?, isi2 = ?, isi3 = ?, isi4 = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$data['pertanyaan'], $data['isi1'], $data['isi2'], $data['isi3'], $data['isi4'], $id]);
    }
    public function delete_pertanyaan($id) {
        $stmt = $this->pdo->prepare("DELETE FROM t_pertanyaan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>