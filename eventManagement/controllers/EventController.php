<?php
require_once __DIR__ . '/../models/EventModel.php';

class EventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new EventModel();
    }

    public function create($titre, $date, $description) {
        if (empty($titre) || empty($date)) {
            throw new Exception("Le titre et la date de l'événement sont obligatoires.");
        }

        // Vérifie si la date est valide
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            throw new Exception("Format de date invalide. Utilisez AAAA-MM-JJ.");
        }

        return $this->eventModel->createEvent($titre, $date, $description);
    }

    public function getAll() {
        return $this->eventModel->getAllEvents();
    }

    public function getById($id) {
        return $this->eventModel->getEventById($id);
    }

    public function update($id, $titre, $date, $description) {
        return $this->eventModel->updateEvent($id, $titre, $date, $description);
    }

    public function delete($id) {
        return $this->eventModel->deleteEvent($id);
    }
}
?>
