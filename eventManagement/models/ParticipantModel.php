<?php
require_once __DIR__ . '/../config/Database.php';

class ParticipantModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CREATE
    public function createParticipant($nom, $email) {
        $sql = "INSERT INTO participants (nom, email) VALUES (:nom, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email
        ]);
    }

    // READ (all)
    public function getAllParticipants() {
        $sql = "SELECT * FROM participants";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (single)
    public function getParticipantById($id) {
        $sql = "SELECT * FROM participants WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateParticipant($id, $nom, $email) {
        $sql = "UPDATE participants SET nom = :nom, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':id' => $id
        ]);
    }

    // DELETE
    public function deleteParticipant($id) {
        $sql = "DELETE FROM participants WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]); 
    }
    
}