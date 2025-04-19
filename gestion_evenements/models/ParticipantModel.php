<?php
require_once '/var/www/html/config/Database.php';

class ParticipantModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createParticipant($nom, $email) {
        $query = "INSERT INTO participants (nom, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $email]);
        return $this->conn->lastInsertId();
    }

    public function getAllParticipants() {
        $query = "SELECT * FROM participants";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
