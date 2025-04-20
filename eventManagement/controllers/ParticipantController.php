<?php
require_once __DIR__ . '/../models/ParticipantModel.php';

class ParticipantController {
    private $participantModel;

    public function __construct() {
        $this->participantModel = new ParticipantModel();
    }

    public function create($nom, $email) {
        if (empty($nom) || empty($email)) {
            throw new Exception("Le nom et l'email sont requis.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email invalide.");
        }

        return $this->participantModel->createParticipant($nom, $email);
    }

    public function getAll() {
        return $this->participantModel->getAllParticipants();
    }

    public function getById($id) {
        return $this->participantModel->getParticipantById($id);
    }

    public function update($id, $nom, $email) {
        return $this->participantModel->updateParticipant($id, $nom, $email);
    }

    public function delete($id) {
        return $this->participantModel->deleteParticipant($id);
    }
}
?>
