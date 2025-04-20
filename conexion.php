<?php

/* Conexion (con PDO, try-catch y desconexión */

class Conexion {
    private $host = "localhost";
    private $db = "usuarios_db";
    private $user = "root";
    private $pass = "1234";
    public $conn;

    public function conectar() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pass);
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
