<?php

/* Modelo de Usuario */

//Crear la clase Usuario para manejar los datos del usuario
//obtenerUsuarios(): Devuelve todos los usuarios.
//agregarUsuario(): Inserta un nuevo usuario con la contraseña encriptada.
//eliminarUsuario(): Elimina un usuario por ID.

require_once __DIR__ . '/../Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerUsuarios() {
        $this->db->query("SELECT * FROM usuarios");
        return $this->db->fetchAll();
    }

    public function agregarUsuario($nombre, $apellido, $username, $password, $email) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $this->db->query("INSERT INTO usuarios (nombre_usuario, lastname_usuario, username_usuario, password_usuario, email_usuario) VALUES (?, ?, ?, ?, ?)", [$nombre, $apellido, $username, $hash, $email]);
    }

    public function eliminarUsuario($id) {
        return $this->db->query("DELETE FROM usuarios WHERE id_usuario = ?", [$id]);
    }

    public function obtenerUsuarioPorId($id) {
        $this->db->query("SELECT * FROM usuarios WHERE id_usuario = ?", [$id]);
        return $this->db->fetch();
    }
    
    public function actualizarUsuario($data) {
        return $this->db->query("UPDATE usuarios SET nombre_usuario = ?, lastname_usuario = ?, username_usuario = ?, email_usuario = ? WHERE id_usuario = ?", [
            $data['nombre'], $data['apellido'], $data['username'], $data['email'], $data['id']
        ]);
    }    
}
?>
