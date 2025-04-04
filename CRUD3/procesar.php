<?php

require_once "Usuario.php";

$usuario = new Usuario();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? null;
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    if ($id) {
        $usuario->actualizarUsuario($id, $nombre, $apellido, $username, $email);
    } else {
        $password = $_POST["password"];
        $usuario->crearUsuario($nombre, $apellido, $username, $password, $email);
    }
    header("Location: index.php");
}

if (isset($_GET["eliminar"])) {
    $usuario->eliminarUsuario($_GET["eliminar"]);
    header("Location: index.php");
}
?>
