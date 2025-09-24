<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "prueba1";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die(" Error: " . $conn->connect_error);
}

echo " Conexión exitosa a MySQL<br>";

// Verificar si la tabla existe
$result = $conn->query("SHOW TABLES LIKE 'usuarios'");
if ($result->num_rows > 0) {
    echo " Tabla 'usuarios' encontrada<br>";
    
    // Mostrar estructura de la tabla
    $describe = $conn->query("DESCRIBE usuarios");
    echo " Campos de la tabla:<br>";
    while ($row = $describe->fetch_assoc()) {
        echo "- " . $row['Field'] . " (" . $row['Type'] . ")<br>";
    }
} else {
    echo " Tabla 'usuarios' NO encontrada<br>";
}

$conn->close();
?> gmail