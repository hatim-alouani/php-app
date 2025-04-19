<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $date_evenement = $_POST['date_evenement'];
    $description = $_POST['description'];

    require_once '../../controllers/EventController.php';
    $controller = new EventController();
    $controller->createEvent($titre, $date_evenement, $description);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un événement</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h1>Créer un événement</h1>

    <form method="POST">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" required><br>

        <label for="date_evenement">Date:</label>
        <input type="date" name="date_evenement" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <button type="submit">Créer</button>
    </form>

    <script src="../../public/js/script.js"></script>
</body>
</html>

