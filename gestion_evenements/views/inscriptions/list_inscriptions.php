<?php
$inscriptions = [];
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    require_once '../../controllers/InscriptionController.php';
    $controller = new InscriptionController();
    $inscriptions = $controller->listInscriptions($event_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Inscriptions</title>
</head>
<body>
    <h1>Inscriptions pour l'événement</h1>

    <ul>
        <?php foreach ($inscriptions as $inscription): ?>
            <li>
                <?php echo $inscription['participant_id']; ?> - <?php echo $inscription['date_inscription']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
