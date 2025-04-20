<?php
class Database {
    private $host = 'mysql';
    private $db_name = 'gestion_evenements';
    private $username = 'root';
    private $password = 'rootpassword'; 
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Étape 1 : connexion initiale sans base sélectionnée
            $pdo = new PDO("mysql:host=" . $this->host, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Étape 2 : création de la base si elle n'existe pas
            $pdo->exec("CREATE DATABASE IF NOT EXISTS " . $this->db_name . " CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

            // Étape 3 : connexion à la base de données
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Étape 4 : création des tables si elles n'existent pas
            $this->createTables();

        } catch(PDOException $exception) {
            echo "Erreur de connexion ou création de base : " . $exception->getMessage();
        }

        return $this->conn;
    }

    private function createTables() {
        // Table events
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS events (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titre VARCHAR(255) NOT NULL,
                date_evenement DATE NOT NULL,
                description TEXT
            );
        ");

        // Table participants
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS participants (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL
            );
        ");

        // Table inscriptions
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS inscriptions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                event_id INT NOT NULL,
                participant_id INT NOT NULL,
                date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
                FOREIGN KEY (participant_id) REFERENCES participants(id) ON DELETE CASCADE
            );
        ");
    }
}
?>
