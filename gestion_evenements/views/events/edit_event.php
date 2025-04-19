<?php
// Assuming you have a route to get an event by ID
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    require_once '../../controllers/EventController.php';
    $controller = new EventController();
    $event = $controller->getEventById($event_id);

    // If the event does not exist, redirect or show an error
    if (!$event) {
        header('Location: /views/events/list_events.php');
        exit();
    }
}

// Update event logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $date_evenement = $_POST['date_evenement'];
    $description = $_POST['description'];

    require_once '../../controllers/EventController.php';
    $controller = new EventController();
    $controller->updateEvent($event_id, $titre, $date_evenement, $description);

    // Redirect to event list after update
    header('Location: /views/events/list_events.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editer l'événement</title>
</head>
<body>
    <h1>Editer l'événement</h1>
    <form method="POST">
        <label for="titre">Titre de l'événement:</label>
        <input type="text" name="titre" value="<?php echo htmlspecialchars($event['titre']); ?>" required><br>

        <label for="date_evenement">Date de l'événement:</label>
        <input type="date" name="date_evenement" value="<?php echo htmlspecialchars($event['date_evenement']); ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($event['description']); ?></textarea><br>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
