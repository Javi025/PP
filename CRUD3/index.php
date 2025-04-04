<?php

require_once "Usuario.php";

$usuario = new Usuario();
$usuarios = $usuario->obtenerUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD POO PHP</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Registrar Usuarios</h2>
<form action="procesar.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Guardar</button>
</form>

<h3>Lista de Usuarios</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $user): ?>
    <tr>
        <td><?= $user["id_usuario"] ?></td>
        <td><?= $user["nombre_usuario"] ?></td>
        <td><?= $user["lastname_usuario"] ?></td>
        <td><?= $user["username_usuario"] ?></td>
        <td><?= $user["email_usuario"] ?></td>
        <td>
            <a href="actualizar.php?id=<?= $user["id_usuario"] ?>">Editar</a>
            <a href="procesar.php?eliminar=<?= $user["id_usuario"] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script src="script.js"></script>

</body>
</html>
