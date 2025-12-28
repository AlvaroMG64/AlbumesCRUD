<?php
class Database
{
    private $host = "localhost";
    private $db_name = "login-php";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(): ?PDO
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
            return null;
        }
    }
}