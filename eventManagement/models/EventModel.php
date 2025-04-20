<?php
require_once __DIR__ . '/../config/Database.php';

class EventModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CREATE
    public function createEvent($titre, $date, $description) {
        $sql = "INSERT INTO events (titre, date_evenement, description) VALUES (:titre, :date, :description)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':titre' => $titre,
            ':date' => $date,
            ':description' => $description
        ]);
    }

    // READ (all)
    public function getAllEvents() {
        $sql = "SELECT * FROM events ORDER BY date_evenement DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (single)
    public function getEventById($id) {
        $sql = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateEvent($id, $titre, $date, $description) {
        $sql = "UPDATE events SET titre = :titre, date_evenement = :date, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':titre' => $titre,
            ':date' => $date,
            ':description' => $description,
            ':id' => $id
        ]);
    }

    // DELETE
    public function deleteEvent($id) {
        $sql = "DELETE FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
