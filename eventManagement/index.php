<?php require_once __DIR__ . '/views/layout/header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Gestion des Événements</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Event Management System</h1>

        <div class="buttons-container">
            <a href="views/events/create_event.php" class="btn">Create an event</a>
            <a href="views/participants/register_participant.php" class="btn">Register a participant</a>
            <a href="views/events/list_events.php" class="btn">List of events</a>
            <a href="views/inscriptions/list_inscriptions.php" class="btn">List of registrations</a>
        </div>
    </div>
    <?php require_once __DIR__ . '/views/layout/footer.php'; ?>
</body>
</html>
