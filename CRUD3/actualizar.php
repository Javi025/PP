<?php

require_once "Usuario.php";

if (!isset($_GET["id"])) {
    die("ID de usuario no proporcionado.");
}

$usuario = new Usuario();
$usuarioData = $usuario->obtenerUsuarioPorId($_GET["id"]);

if (!$usuarioData) {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Editar Usuario</h2>
<form action="procesar.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuarioData['id_usuario'] ?>">
    
    <input type="text" name="nombre" value="<?= $usuarioData['nombre_usuario'] ?>" required>
    <input type="text" name="apellido" value="<?= $usuarioData['lastname_usuario'] ?>" required>
    <input type="text" name="username" value="<?= $usuarioData['username_usuario'] ?>" required>
    <input type="email" name="email" value="<?= $usuarioData['email_usuario'] ?>" required>

    <button type="submit">Actualizar</button>
    <a href="index.php" class="cancelar">Cancelar</a>
</form>

</body>
</html>
