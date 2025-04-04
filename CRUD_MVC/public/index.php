<?php

/* Vistas */

//Crear index para listar usuarios:

include __DIR__ . '/../views/usuarios/lista.php';
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
$controller = new UsuarioController();
$usuarios = $controller->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP MVC</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Lista de Usuarios</h1>
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
                <button onclick="eliminarUsuario(<?= $usuario['id_usuario'] ?>)">Eliminar</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function eliminarUsuario(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "No podrás revertir esta acción",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "delete.php?id=" + id;
                }
            });
        }
    </script>
</body>
</html>
