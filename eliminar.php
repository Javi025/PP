<?php

/* Eliminar usuario desde el ID */

//Este archivo se ejecuta después de confirmar en SweetAlert2 y elimina el usuario por su ID.

require_once 'UsuarioController.php';

if (!isset($_GET['id'])) {
    echo "ID no especificado.";
    exit;
}

$id = $_GET['id'];

$controlador = new UsuarioController();
$resultado = $controlador->eliminarUsuario($id);

if ($resultado) {
    echo "<script>
            alert('Usuario eliminado correctamente');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Error al eliminar el usuario');
            window.history.back();
          </script>";
}
?>
