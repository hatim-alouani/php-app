<?php
require_once '/var/www/html/models/ParticipantModel.php';

class ParticipantController {
    public function createParticipant($nom, $email) {
        $participantModel = new ParticipantModel();
        return $participantModel->createParticipant($nom, $email);
    }

    public function getAllParticipants() {
        $participantModel = new ParticipantModel();
        return $participantModel->getAllParticipants();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<body>
    <br><br>
    <a href="/index.php">
        <button type="button">Retour à l'Accueil</button>
    </a>
</body>
</html>
