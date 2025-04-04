<!--  Implementación de form -->
<!--  Este formulario será reutilizado en create.php y update.php. 
      Se usa para crear y editar.
      $action se define en create.php y update.php para que el formulario funcione en ambos casos.
      El campo de contraseña solo aparece en "Crear" para evitar sobrescribir contraseñas en la edición. -->

<form action="<?= $action ?>" method="POST">
    <?php if (isset($usuario)): ?>
        <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
    <?php endif; ?>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $usuario['nombre_usuario'] ?? '' ?>" required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="<?= $usuario['lastname_usuario'] ?? '' ?>" required>

    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= $usuario['username_usuario'] ?? '' ?>" required>

    <?php if (!isset($usuario)): ?>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
    <?php endif; ?>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $usuario['email_usuario'] ?? '' ?>" required>

    <button type="submit"><?= isset($usuario) ? 'Actualizar' : 'Guardar' ?></button>
</form>
