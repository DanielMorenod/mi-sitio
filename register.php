<?php
session_start();
require 'includes/db.php';
if ($_POST) {
  $stmt = $pdo->prepare("INSERT INTO usuarios (nombre,email,contraseña) VALUES(?,?,?)");
  $stmt->execute([$_POST['nombre'], $_POST['email'], $_POST['password']]);
  $_SESSION['usuario'] = ['nombre'=>$_POST['nombre'], 'email'=>$_POST['email'], 'id'=>$pdo->lastInsertId()];
  header('Location: preferencias.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Registro</title>
<link rel="stylesheet" href="css/style.css"></head>
<body>
<form method="post"><h2>Registro</h2>
<input name="nombre" placeholder="Nombre" required>
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Contraseña" required>
<button type="submit">Registrar</button>
<a href="index.php" class="boton-menu-global">🍽 Ir al menú</a>
</form></body></html>
