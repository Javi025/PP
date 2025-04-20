<?php

/* Listar todos los usuarios */

//Este archivo será la página principal donde listamos todos los usuarios en una tabla con botones para crear, editar y eliminar. 
//Usamos el UsuarioController para obtener los datos.

require_once 'UsuarioController.php';

$controlador = new UsuarioController();
$usuarios = $controlador->obtenerUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="crear.php" class="btn">Agregar Usuario</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id_usuario'] ?></td>
                        <td><?= $usuario['nombre_usuario'] ?></td>
                        <td><?= $usuario['lastname_usuario'] ?></td>
                        <td><?= $usuario['username_usuario'] ?></td>
                        <td><?= $usuario['email_usuario'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $usuario['id_usuario'] ?>" class="btn editar">Editar</a>
                            <button class="btn eliminar" onclick="confirmarEliminacion(<?= $usuario['id_usuario'] ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
