<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");

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

$sql = "DELETE FROM usuario WHERE usuario = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "message" => "Error al preparar la consulta: " . $conn->error]);
    exit;
}

$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    $response = ["success" => true, "message" => "Usuario eliminado correctamente"];
} else {
    $response = ["success" => false, "message" => "Error al eliminar usuario: " . $stmt->error];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
