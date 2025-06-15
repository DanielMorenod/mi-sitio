<?php
session_start();
require 'includes/db.php';
if ($_POST) {
  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email=? AND contraseña=?");
  $stmt->execute([$_POST['email'], $_POST['password']]);
  if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['usuario'] = $user;
    header('Location: preferencias.php');
    exit;
  } else $error = "Credenciales inválidas";
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Login</title>
<link rel="stylesheet" href="css/style.css"></head>
<body>
<form method="post"><h2>Iniciar Sesión</h2>
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Contraseña" required>
<button type="submit">Entrar</button>
<a href="index.php" class="boton-menu-global">🍽 Ir al menú</a>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<p><a href="register.php">Regístrate</a></p>
</form></body></html>
