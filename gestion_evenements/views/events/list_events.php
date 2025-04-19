<?php
require_once '../../controllers/EventController.php';
$controller = new EventController();
$events = $controller->listEvents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
</head>
<body>
    <h1>Liste des événements</h1>

    <ul>
        <?php foreach ($events as $event): ?>
            <li>
                <?php echo $event['titre']; ?> - <?php echo $event['date_evenement']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
