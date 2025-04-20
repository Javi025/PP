<!-- Formulario para agregar usuario nuevo -->

<!-- Este archivo muestra un formulario para registrar un nuevo usuario. Cuando el formulario se envía, los datos van a guardar.php. -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Usuario</h1>
        <form action="guardar.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn editar">Cancelar</a>
        </form>
    </div>
</body>
</html>
