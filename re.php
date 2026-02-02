<?php
class Re {
    private $conn;
    private $table_name = "re";

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create($name, $email, $experience, $recommendation) {
        $sql = "INSERT INTO " . $this->table_name . " 
                (name, email, experience, recommendation) 
                VALUES (:name, :email, :experience, :recommendation)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':experience' => $experience,
            ':recommendation' => $recommendation
        ]);
    }

   
    public function addReview($name, $email, $experience, $recommendation) {
        return $this->create($name, $email, $experience, $recommendation);
    }

    // READ ALL
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $name, $email, $experience, $recommendation) {
        $sql = "UPDATE " . $this->table_name . " 
                SET name=:name, email=:email, experience=:experience, recommendation=:recommendation 
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':experience' => $experience,
            ':recommendation' => $recommendation
        ]);
    }

    // DELETE
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
