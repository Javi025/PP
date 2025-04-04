<?php

class Database {
    private $host = "localhost";
    private $dbname = "crud_poo3";
    private $username = "root"; 
    private $password = "1234";
    private $conn;

    public function conectar() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->conn = null;
    }
}
?>
