<?php
require_once __DIR__ . '/../models/InscriptionModel.php';

class InscriptionController {
    private $inscriptionModel;

    public function __construct() {
        $this->inscriptionModel = new InscriptionModel();
    }

    public function create($event_id, $participant_id) {
        if (empty($event_id) || empty($participant_id)) {
            throw new Exception("Veuillez sélectionner un événement et un participant.");
        }

        return $this->inscriptionModel->createInscription($event_id, $participant_id);
    }

    public function getAll() {
        return $this->inscriptionModel->getAllInscriptions();
    }

    public function delete($id) {
        return $this->inscriptionModel->deleteInscription($id);
    }
}
?>
