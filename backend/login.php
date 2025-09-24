<?php
header("Access-Control-allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// 1. Recibir JSON desde fetch
$json = file_get_contents("php://input");
$data = json_decode($json, true);

// 2. Extraer variables
$username = $data["username"] ?? "";
$password = MD5($data["password"] ?? "");

// 3. Conectar a la BD
$conn = new mysqli("localhost", "root", "", "prueba1");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Error en la conexión a la BD"]);
    exit;
}

// 4. Consulta con prepared statement
$stmt = $conn->prepare("SELECT * FROM `base de datos` WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// 5. Responder al frontend
if ($result->num_rows > 0) {
    echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso"]);
} else {
    echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"]);
}

$stmt->close();
$conn->close();

?>