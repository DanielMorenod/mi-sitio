<?php
$host='localhost';$db='tfg_restaurantes';$user='root';$pass='';$dsn="mysql:host=$host;dbname=$db;charset=utf8mb4";
try{$pdo=new PDO($dsn,$user,$pass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);}catch(Exception $e){die('Error conexión BBDD: '.$e->getMessage());}