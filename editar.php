<?php

/* Formulario para editar usuario existente */

//Este archivo mostrará el formulario rellenado con los datos del usuario a editar. Los datos se enviarán a actualizar.php.

require_once 'UsuarioController.php';

if (!isset($_GET['id'])) {
    echo "ID de usuario no especificado.";
    exit;
}

$id = $_GET['id'];

$controlador = new UsuarioController();
$usuario = $controlador->obtenerUsuario($id);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= $usuario['nombre_usuario'] ?>" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" value="<?= $usuario['lastname_usuario'] ?>" required>

            <label>Username:</label>
            <input type="text" name="username" value="<?= $usuario['username_usuario'] ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= $usuario['email_usuario'] ?>" required>

            <button type="submit" class="btn">Actualizar</button>
            <a href="index.php" class="btn editar">Cancelar</a>
        </form>
    </div>
</body>
</html>
