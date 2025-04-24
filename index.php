<?php
require 'config.php'; require 'autoload.php';

if(!isset($_SESSION['uid'])){ header('Location: login.php'); exit; }

$usuarios = User::all();
Database::disconnect();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><title>Dashboard</title>
<link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Bienvenido, <?=htmlspecialchars($_SESSION['uname'])?></h1>
    <a href="logout.php" class="btn btn-outline-danger">Salir</a>
  </div>

  <h2 class="h5">Usuarios registrados</h2>
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead><tr><th>#</th><th>Nombre</th><th>Usuario</th><th>Email</th></tr></thead>
      <tbody>
        <?php foreach($usuarios as $u): ?>
          <tr>
            <td><?=$u->id?></td>
            <td><?=$u->nombre.' '.$u->apellido?></td>
            <td><?=$u->username?></td>
            <td><?=$u->email?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</body>
</html>
