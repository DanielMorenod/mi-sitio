<?php 
session_start();
require 'includes/db.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM restaurantes WHERE id = ?");
$stmt->execute([$id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($r['nombre']) ?></title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .mapa {
      margin: 30px 0;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }
    .container {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
    }
    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<div class="container">
  <h1><?= htmlspecialchars($r['nombre']) ?></h1>
  <p><strong>Tipo:</strong> <?= htmlspecialchars($r['tipo']) ?></p>
  <p><strong>Descripción:</strong> <?= nl2br(htmlspecialchars($r['descripcion'])) ?></p>
  <p><strong>Carta:</strong> <?= nl2br(htmlspecialchars($r['carta'])) ?></p>

  <?php if (!empty($r['iframe'])): ?>
    <div class="mapa">
      <?= $r['iframe'] ?>
    </div>
  <?php else: ?>
    <p><em>Mapa no disponible para este restaurante.</em></p>
  <?php endif; ?>

  <a class="btn" href="reservar.php?id=<?= $r['id'] ?>">Reservar</a>
</div>
</body>
</html>
