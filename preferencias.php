<?php
session_start();
require 'includes/db.php';
if (!isset($_SESSION['usuario'])) header('Location: login.php');
if ($_POST) {
  $_SESSION['pref_tipo'] = $_POST['tipo'];
  $pdo->prepare("UPDATE usuarios SET preferencias=? WHERE id=?")
      ->execute([$_POST['tipo'], $_SESSION['usuario']['id']]);
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Preferencias</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<form method="post"><h2>¿Qué te apetece?</h2>
<select name="tipo" required>
  <option value="">Selecciona...</option>
  <option>Vegetariano</option>
  <option>Costillas</option>
  <option>Italiano</option>
  <option>Indio</option>
</select>
<button>Guardar</button>
</form></body></html>
