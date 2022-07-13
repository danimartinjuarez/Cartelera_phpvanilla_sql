<?php
$server = "localhost";
$user = "root";
$pass = "";
$nameDataBase= "movies";

try {
    $conection= new PDO("mysql:host=$server;dbname=$nameDataBase", $user, $pass);
    $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion guay";
} catch (PDOException $e) {
    echo "La conexion ha fallado: ".$e->getMessage();
}