<?php
error_reporting(0);
ini_set('display_errors', 0);


header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}


require_once 'conexion.php';

$json = file_get_contents("php://input");
$data = json_decode($json, true);

if (!$data) {

    header('Content-Type: application/json');
    echo json_encode(["error" => "Datos JSON inválidos"]);
    exit;
}


$username = $data['username'];
$password = $data['password'];
$nombre   = $data['nombre'];
$apellidos = $data['apellidos'];
$fechaNacimiento = $data['fechaNacimiento'];

$sql = "INSERT INTO usuario (usuario, contra, nombre, apellidos, fecha_nacimiento)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if(!$stmt) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "message" => "Error al preparar la consulta: " . $conn->error]);
    exit;
}

$stmt->bind_param("sssss", $username, $password, $nombre, $apellidos, $fechaNacimiento);

if ($stmt->execute()) {
    $response = ["success" => true, "message" => "Usuario creado correctamente"];
} else {
    $response = ["success" => false, "message" => "Error al crear usuario: " . $stmt->error];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
