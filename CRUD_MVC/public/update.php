<?php

/* Formulario para Editar Usuarios */

//Obtiene el usuario a editar mediante obtenerUsuarioPorId($id).
//El formulario precarga los datos del usuario.
//Si se envía el formulario, se llama a actualizarUsuario() para guardar los cambios.

$action = 'update.php';
$usuario = $usuarioModel->obtenerUsuarioPorId($_GET['id']);
include __DIR__ . '/../views/usuarios/form.php'; 
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

$controller = new UsuarioController();
$usuarioModel = new Usuario();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $usuarioModel->obtenerUsuarioPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $_POST['id'],
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'username' => $_POST['username'],
        'email' => $_POST['email']
    ];

    if ($usuarioModel->actualizarUsuario($data)) {
        header("Location: index.php?mensaje=Usuario actualizado");
        exit();
    } else {
        echo "<p>Error al actualizar el usuario</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $usuario['nombre_usuario'] ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?= $usuario['lastname_usuario'] ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $usuario['username_usuario'] ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $usuario['email_usuario'] ?>" required>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
