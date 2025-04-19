<?php
require_once '/var/www/html/config/Database.php';

class EventModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createEvent($titre, $date_evenement, $description) {
        $query = "INSERT INTO events (titre, date_evenement, description) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$titre, $date_evenement, $description]);
        return $this->conn->lastInsertId();
    }

    public function getAllEvents() {
        $query = "SELECT * FROM events";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateEvent($id, $titre, $date_evenement, $description) {
        $query = "UPDATE events SET titre = ?, date_evenement = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titre, $date_evenement, $description, $id]);
    }

    public function deleteEvent($id) {
        $query = "DELETE FROM events WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
