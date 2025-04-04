<?php

/* Controlador de Usuarios */

require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        return $this->usuarioModel->obtenerUsuarios();
    }

    public function store($data) {
        return $this->usuarioModel->agregarUsuario($data['nombre'], $data['apellido'], $data['username'], $data['password'], $data['email']);
    }

    public function delete($id) {
        return $this->usuarioModel->eliminarUsuario($id);
    }
}
?>
