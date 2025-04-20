<?php
require_once __DIR__ . '/../../controllers/EventController.php';
require_once __DIR__ . '/../layout/header.php';

$eventController = new EventController();
$events = $eventController->getAll();
?>
<!-- Bouton Retour à l'accueil -->
<div style="text-align: center; margin-top: 30px;">
    <a href="/../../index.php" style="
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
    <title>List of Events</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .empty-message {
            text-align: center;
            color: #7f8c8d;
            margin-top: 30px;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                position: sticky;
                top: 0;
                background-color: #3498db;
                color: white;
            }

            td {
                padding: 10px;
                border: none;
                border-bottom: 1px solid #ddd;
                position: relative;
            }

            td:before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                color: #34495e;
            }

            td:last-child {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>List of Events</h2>

    <?php if (empty($events)): ?>
        <p class="empty-message">Aucun événement trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td data-label="Title"><?= htmlspecialchars($event['titre']) ?></td>
                        <td data-label="Date"><?= htmlspecialchars($event['date_evenement']) ?></td>
                        <td data-label="Description"><?= htmlspecialchars($event['description']) ?></td>
                        <td data-label="Actions">
                            <a href="edit_event.php?id=<?= $event['id'] ?>">Modify</a> |
                            <a href="delete_event.php?id=<?= $event['id'] ?>" onclick="return confirm('Are you sure you want to delete this event ?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
