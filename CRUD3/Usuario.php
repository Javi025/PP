<?php

require_once "database.php";

class Usuario {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conectar();
    }

    public function crearUsuario($nombre, $apellido, $username, $password, $email) {
        try {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios (nombre_usuario, lastname_usuario, username_usuario, password_usuario, email_usuario) 
                    VALUES (:nombre, :apellido, :username, :password, :email)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashed_password);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function obtenerUsuarios() {
        try {
            $sql = "SELECT id_usuario, nombre_usuario, lastname_usuario, username_usuario, email_usuario FROM usuarios";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerUsuarioPorId($id) {
        try {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function actualizarUsuario($id, $nombre, $apellido, $username, $email) {
        try {
            $sql = "UPDATE usuarios SET nombre_usuario = :nombre, lastname_usuario = :apellido, username_usuario = :username, email_usuario = :email WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function eliminarUsuario($id) {
        try {
            $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->db = null;
    }
}
?>
