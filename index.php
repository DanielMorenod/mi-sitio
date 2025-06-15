<?php
session_start();
require 'includes/db.php';
require 'includes/funciones.php';
$restaurantes = obtenerRestaurantes($pdo, $_SESSION['pref_tipo'] ?? null);
$imagenes = ['img/imagen 1.jfif', 'img/imagen2.jpg', 'img/imagen3.jpg', 'img/imagen4.jfif'];
$i = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recomendador de Restaurantes</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<p style="text-align:right;"><a href="logout.php">Cerrar sesión</a></p>
  <div class="container">
    <h1>Bienvenido <?php echo $_SESSION['usuario']['nombre'] ?? 'Invitado'; ?></h1>
    <div class="grid">
      <?php foreach($restaurantes as $r): ?>
      <div class="card">
        <img src="<?= $imagenes[$i++] ?>" alt="" style="width:100%; height:auto;">
        <h3><?= $r['nombre'] ?></h3>
        <p><?= $r['carta'] ?></p>
        <a class="btn" href="restaurante.php?id=<?= $r['id'] ?>">Ver más</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
