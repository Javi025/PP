<?php
require 'config.php'; require 'autoload.php';

$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  try{
    User::login($_POST['user']??'',$_POST['pass']??'');
    header('Location: index.php'); exit;
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
<meta charset="utf-8"><title>Login</title>
<link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
  <form method="post" class="p-4 shadow rounded-3 w-100" style="max-width:340px">
    <h3 class="text-center mb-3">Iniciar sesión</h3>

    <?php if($msg):?>
      <div class="alert alert-danger"><?=htmlspecialchars($msg)?></div>
    <?php endif;?>

    <input name="user" class="form-control mb-2" placeholder="Usuario" required>
    <input name="pass" type="password" class="form-control mb-3" placeholder="Contraseña" required>
    <button class="btn btn-primary w-100">Entrar</button>
    <a href="register.php" class="d-block mt-2 text-center">Crear cuenta</a>
  </form>
</body>
</html>
