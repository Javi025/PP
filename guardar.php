<?php

/* Insertar usuario en la base de datos */

//Este archivo recibe los datos del formulario y usa el UsuarioController para agregarlos.

require_once 'UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $controlador = new UsuarioController();
    $resultado = $controlador->crearUsuario($nombre, $apellido, $username, $password, $email);

    if ($resultado) {
        echo "<script>
                alert('Usuario creado correctamente');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al crear el usuario');
                window.history.back();
              </script>";
    }
}
?>
