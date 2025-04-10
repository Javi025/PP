<?php

/* Controlador del usuario (POO) */

//Este archivo sirve como puente entre la vista (HTML) y el modelo (Usuario.php). 
//Aquí vamos a instanciar la clase Usuario y exponer funciones fáciles de usar desde las páginas (como index.php, crear.php, etc).

require_once 'Usuario.php';

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function obtenerUsuarios() {
        return $this->modelo->obtenerUsuarios();
    }

    public function obtenerUsuario($id) {
        return $this->modelo->obtenerUsuarioPorId($id);
    }

    public function crearUsuario($nombre, $apellido, $username, $password, $email) {
        return $this->modelo->crearUsuario($nombre, $apellido, $username, $password, $email);
    }

    public function actualizarUsuario($id, $nombre, $apellido, $username, $email) {
        return $this->modelo->actualizarUsuario($id, $nombre, $apellido, $username, $email);
    }

    public function eliminarUsuario($id) {
        return $this->modelo->eliminarUsuario($id);
    }
}
?>
