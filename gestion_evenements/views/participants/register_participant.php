<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    require_once '../../controllers/ParticipantController.php';
    $controller = new ParticipantController();
    $controller->createParticipant($nom, $email);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>S'inscrire à un événement</title>
</head>
<body>
    <h1>S'inscrire à un événement</h1>

    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
