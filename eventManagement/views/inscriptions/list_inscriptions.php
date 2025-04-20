
<?php
require_once __DIR__ . '/../../controllers/InscriptionController.php';
require_once __DIR__ . '/../layout/header.php';

$inscriptionController = new InscriptionController();
$inscriptions = $inscriptionController->getAll();
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
    <title>List of Registrations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 16px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                margin-bottom: 20px;
            }

            td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 20px;
                font-weight: bold;
                color: #34495e;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>List of Registrations</h2>

    <?php if (empty($inscriptions)): ?>
        <p>No registration found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Participant</th>
                    <th>Event</th>
                    <th>Registration date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscriptions as $inscription): ?>
                    <tr>
                        <td data-label="Participant"><?= htmlspecialchars($inscription['participant_nom']) ?></td>
                        <td data-label="Event"><?= htmlspecialchars($inscription['event_titre']) ?></td>
                        <td data-label="Registration date"><?= htmlspecialchars($inscription['date_inscription']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
