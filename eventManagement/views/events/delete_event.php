<?php
require_once __DIR__ . '/../../controllers/EventController.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $event_id = $_GET['id'];

    $eventController = new EventController();

    try {
        $eventController->delete($event_id);
        header('Location: list_events.php');
        exit;
    } catch (Exception $e) {
        echo "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    echo "<p style='color:red;'>Event not found.</p>";
}
?> 
