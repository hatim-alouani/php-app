<?php
$file_path = '/var/www/html/models/EventModel.php';
if (file_exists($file_path)) {
    // echo "File exists!";
    require_once $file_path;
} else {
    echo "File does not exist!";
}

class EventController {
    public function createEvent($titre, $date_evenement, $description) {
        $eventModel = new EventModel();
        return $eventModel->createEvent($titre, $date_evenement, $description);
    }

    public function listEvents() {
        $eventModel = new EventModel();
        return $eventModel->getAllEvents();
    }

    public function updateEvent($id, $titre, $date_evenement, $description) {
        $eventModel = new EventModel();
        return $eventModel->updateEvent($id, $titre, $date_evenement, $description);
    }

    public function deleteEvent($id) {
        $eventModel = new EventModel();
        return $eventModel->deleteEvent($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <br><br>
    <a href="/index.php">
        <button type="button">Retour à l'Accueil</button>
    </a>
</body>
</html>

