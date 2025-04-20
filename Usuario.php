<?php

/* Modelo de Usuario (POO) */

//Este archivo tendrá todos los métodos para manipular los usuarios: crear, leer, actualizar y eliminar. 
//Vamos a usar PDO y manejar los errores con try-catch.

require_once 'conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function obtenerUsuarios() {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener usuarios: " . $e->getMessage());
        }
    }

    public function obtenerUsuarioPorId($id) {
        try {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener usuario: " . $e->getMessage());
        }
    }

    public function crearUsuario($nombre, $apellido, $username, $password, $email) {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre_usuario, lastname_usuario, username_usuario, password_usuario, email_usuario)
                    VALUES (:nombre, :apellido, :username, :password, :email)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al crear usuario: " . $e->getMessage());
        }
    }

    public function actualizarUsuario($id, $nombre, $apellido, $username, $email) {
        try {
            $sql = "UPDATE usuarios SET nombre_usuario = :nombre, lastname_usuario = :apellido,
                    username_usuario = :username, email_usuario = :email WHERE id_usuario = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al actualizar usuario: " . $e->getMessage());
        }
    }

    public function eliminarUsuario($id) {
        try {
            $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al eliminar usuario: " . $e->getMessage());
        }
    }
}
?>
