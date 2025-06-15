<?php
session_start();
require 'includes/db.php';
if (!isset($_SESSION['usuario'])) header('Location: login.php');
if ($_POST) {
  $pdo->prepare("INSERT INTO reservas (id_usuario,id_restaurante,fecha,estado)
    VALUES(?,?,?,?)")
    ->execute([$_SESSION['usuario']['id'], $_POST['restaurante'], $_POST['fecha'], 'confirmada']);
  echo "<script>alert('¡Reserva confirmada!');window.location='index.php';</script>";
  exit;
}
$id = $_GET['id'] ?? 0;
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Reserva</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<form method="post"><h2>Haz tu reserva</h2>
<input type="hidden" name="restaurante" value="<?= $id ?>">
<input name="fecha" type="datetime-local" required>
<button type="submit">Confirmar</button>
</form></body></html>
