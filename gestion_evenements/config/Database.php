<?php
class Database {
    // Update this to the MySQL container's hostname in Docker (usually set in docker-compose.yml)
    private $host = 'mysql';  // Change 'db' to your MySQL container's name or network alias
    private $db_name = 'gestion_evenements';
    private $username = 'root';
    private $password = 'hatim';
    private $conn;

    public function getConnection() {
        $this->conn = null;  // Use $this->conn consistently
        try {
            // MySQL connection string using container's hostname or network alias
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
