<?php
require_once __DIR__ . '/../config/Database.php';

class InscriptionModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CREATE
    public function createInscription($event_id, $participant_id) {
        $sql = "INSERT INTO inscriptions (event_id, participant_id, date_inscription) 
                VALUES (:event_id, :participant_id, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':event_id' => $event_id,
            ':participant_id' => $participant_id
        ]);
    }

    // READ (all inscriptions)
    public function getAllInscriptions() {
        $sql = "SELECT i.id, e.titre AS event_titre, p.nom AS participant_nom, i.date_inscription
        FROM inscriptions i
        JOIN events e ON i.event_id = e.id
        JOIN participants p ON i.participant_id = p.id
        ORDER BY i.date_inscription DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // DELETE
    public function deleteInscription($id) {
        $sql = "DELETE FROM inscriptions WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
