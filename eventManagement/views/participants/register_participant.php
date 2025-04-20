<?php
require_once __DIR__ . '/../../controllers/ParticipantController.php';
require_once __DIR__ . '/../../controllers/EventController.php';
require_once __DIR__ . '/../../controllers/InscriptionController.php';
require_once __DIR__ . '/../layout/header.php';

$participantController = new ParticipantController();
$eventController = new EventController();
$inscriptionController = new InscriptionController();

$message = '';

try {
    $events = $eventController->getAll();
} catch (Exception $e) {
    $message = "<p class='error-message'>Erreur de chargement des événements : " . htmlspecialchars($e->getMessage()) . "</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $event_id = $_POST['event_id'] ?? '';

        $participantController->create($nom, $email);
        $participants = $participantController->getAll();
        $lastParticipant = end($participants);
        $inscriptionController->create($event_id, $lastParticipant['id']);

        $message = "<p class='success-message'>Registration successful!</p>";
    } catch (Exception $e) {
        $message = "<p class='error-message'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
<!-- Bouton Retour à l'accueil -->
<div style="text-align: center; margin-top: 30px;">
    <a href="/index.php" style="
        display: inline-block;
        padding: 12px 24px;
        background-color:rgb(68, 134, 160);
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    " onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">
        Home
    </a>
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscrire un Participant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            color: #34495e;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #2980b9;
        }

        .success-message {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .error-message {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register a Participant for an Event</h2>
        <?= $message ?>
        <form method="post">
            <label for="nom">Name :</label>
            <input type="text" name="nom" id="nom" required>

            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="event_id">Event :</label>
            <select name="event_id" id="event_id" required>
                <option value="">--Select an event--</option>
                <?php foreach ($events as $event): ?>
                    <option value="<?= $event['id'] ?>"><?= htmlspecialchars($event['titre']) ?> (<?= $event['date_evenement'] ?>)</option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
    <?php require_once __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
