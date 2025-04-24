<?php
require 'config.php'; require 'autoload.php';

$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  try{
    User::create($_POST);
    $msg='Usuario creado. Ahora inicia sesión.';
  }catch(Throwable $e){
    $msg=$e->getMessage();
  }finally{
    Database::disconnect();
  }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><title>Registro</title>
<link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
  <h1 class="mb-4">Registro</h1>

  <?php if($msg):?>
   <div class="alert alert-info"><?=htmlspecialchars($msg)?></div>
  <?php endif;?>

  <form method="post" class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Nombre</label>
      <input name="nombre" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Apellido</label>
      <input name="apellido" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Usuario</label>
      <input name="username" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Contraseña</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="col-12">
      <button class="btn btn-success">Registrar</button>
      <a href="login.php" class="btn btn-link">Ya tengo cuenta</a>
    </div>
  </form>
</body>
</html>
