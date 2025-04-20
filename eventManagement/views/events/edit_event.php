<?php
require_once __DIR__ . '/../../controllers/EventController.php';
require_once __DIR__ . '/../layout/header.php';

$eventController = new EventController();
$message = '';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $event_id = $_GET['id'];
    try {
        $event = $eventController->getById($event_id);
    } catch (Exception $e) {
        $message = "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    $message = "<p style='color:red;'>Événement non trouvé.</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $titre = $_POST['titre'] ?? '';
        $date = $_POST['date_evenement'] ?? '';
        $description = $_POST['description'] ?? '';

        $eventController->update($event_id, $titre, $date, $description);
        $message = "<p style='color:green;'>Event successfully modified!</p>";
    } catch (Exception $e) {
        $message = "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
<!-- Bouton Retour à l'accueil -->
<div style="text-align: center; margin-top: 30px;">
    <a href="/index.php" style="
        display: inline-block;
        padding: 12px 24px;
        background-color: #3498db;
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
    <title>Edit Event</title>
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

        form label {
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        .message p {
            font-size: 16px;
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
    <h2>Edit Eventt</h2>

    <div class="message"><?= $message ?></div>

    <?php if (isset($event)): ?>
        <form method="post">
            <label for="titre">Title :</label>
            <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($event['titre']) ?>" required>

            <label for="date_evenement">Date (DD-MM-YYYY) :</label>
            <input type="date" name="date_evenement" id="date_evenement" value="<?= htmlspecialchars($event['date_evenement']) ?>" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4"><?= htmlspecialchars($event['description']) ?></textarea>

            <button type="submit">Update</button>
        </form>
    <?php endif; ?>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
