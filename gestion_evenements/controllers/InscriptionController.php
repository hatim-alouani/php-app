<?php
require_once '/var/www/html/models/InscriptionModel.php';

class InscriptionController {
    public function registerParticipant($event_id, $participant_id) {
        $inscriptionModel = new InscriptionModel();
        return $inscriptionModel->register($event_id, $participant_id);
    }

    public function listInscriptions($event_id) {
        $inscriptionModel = new InscriptionModel();
        return $inscriptionModel->getInscriptionsForEvent($event_id);
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
