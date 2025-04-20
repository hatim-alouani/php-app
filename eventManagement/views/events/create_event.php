
<?php
require_once __DIR__ . '/../../controllers/EventController.php';
require_once __DIR__ . '/../layout/header.php';

$eventController = new EventController();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $titre = $_POST['titre'] ?? '';
        $date = $_POST['date_evenement'] ?? '';
        $description = $_POST['description'] ?? '';

        $eventController->create($titre, $date, $description);
        $message = "<p class='success-message'>Event added successfully!</p>";
    } catch (Exception $e) {
        $message = "<p class='error-message'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

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
    <title>Create an Event</title>
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
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
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
        <h2>Create a New Event</h2>
        <?= $message ?>
        <form method="post">
            <label for="titre">Title :</label>
            <input type="text" name="titre" id="titre" required>

            <label for="date_evenement">Date (DD-MM-YYYY) :</label>
            <input type="date" name="date_evenement" id="date_evenement" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4"></textarea>

            <button type="submit">Create the Event</button>
        </form>
    </div>
    <?php require_once __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
