<?php

/* Eliminar Usuarios con Confirmación */

//Crear el archivo delete
//Obtiene el id del usuario desde $_GET['id'].
//Llama a delete() en UsuarioController.php para eliminarlo.
//Redirige a index.php si la eliminación es exitosa.

require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

$controller = new UsuarioController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($controller->delete($id)) {
        header("Location: index.php?mensaje=Usuario eliminado");
        exit();
    } else {
        echo "<p>Error al eliminar el usuario</p>";
    }
}
?>
