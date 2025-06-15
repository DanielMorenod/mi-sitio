<?php
function loginCheck(){if(!isset($_SESSION['usuario'])){header('Location: login.php');exit;}}
function obtenerRestaurantes($pdo,$tipo=null){if($tipo){$stmt=$pdo->prepare("SELECT * FROM restaurantes WHERE tipo = ?");$stmt->execute([$tipo]);}else{$stmt=$pdo->query("SELECT * FROM restaurantes");}return $stmt->fetchAll(PDO::FETCH_ASSOC);}