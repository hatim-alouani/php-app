<?php
require_once '/var/www/html/config/Database.php';

class InscriptionModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($event_id, $participant_id) {
        $date_inscription = date('Y-m-d H:i:s');
        $query = "INSERT INTO inscriptions (event_id, participant_id, date_inscription) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$event_id, $participant_id, $date_inscription]);
    }

    public function getInscriptionsForEvent($event_id) {
        $query = "SELECT * FROM inscriptions WHERE event_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$event_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
