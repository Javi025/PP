<?php

/* Guardar los cambios del usuario */

//Ahora guardamos los cambios editados en la base de datos.

require_once 'UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $controlador = new UsuarioController();
    $resultado = $controlador->actualizarUsuario($id, $nombre, $apellido, $username, $email);

    if ($resultado) {
        echo "<script>
                alert('Usuario actualizado correctamente');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar el usuario');
                window.history.back();
              </script>";
    }
}
?>
