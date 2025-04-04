<?php

/* Implementación de lista */

//Este archivo solo contendrá la tabla con la lista de usuarios y se incluirá en index.php para mejor organización.

require_once __DIR__ . '/../../app/Controllers/UsuarioController.php';
$controller = new UsuarioController();
$usuarios = $controller->index();
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Username</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['id_usuario'] ?></td>
        <td><?= $usuario['nombre_usuario'] ?></td>
        <td><?= $usuario['lastname_usuario'] ?></td>
        <td><?= $usuario['username_usuario'] ?></td>
        <td><?= $usuario['email_usuario'] ?></td>
        <td>
            <a href="update.php?id=<?= $usuario['id_usuario'] ?>">Editar</a>
            <button onclick="eliminarUsuario(<?= $usuario['id_usuario'] ?>)">Eliminar</button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
