<?php

/* Formulario para Agregar Usuarios */

//Crear el archivo create para registrar usuarios

//El formulario envía los datos a create.php con el método POST.
//Si el formulario se envía, se llama al método store() en UsuarioController.php para guardar el usuario.
//Si la inserción es exitosa, redirige a index.php.

$action = 'create.php'; 
include __DIR__ . '/../views/usuarios/form.php'; 
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email']
    ];

    if ($controller->store($data)) {
        header("Location: index.php?mensaje=Usuario creado exitosamente");
        exit();
    } else {
        echo "<p>Error al crear el usuario</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form action="create.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
