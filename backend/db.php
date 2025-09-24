<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "prueba1";
$port = 3306;

// CORRECCIÓN: Cambiar $db por $dbname
$conn = new mysqli($host, $user, $pass, $dbname, 3306);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Agregar esta línea para caracteres especiales
$conn->set_charset("utf8mb4");
?>
