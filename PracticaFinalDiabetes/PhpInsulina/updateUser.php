<?php
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
$nombre = $data['nombre'];
$apellidos = $data['apellidos'];
$fechaNacimiento = $data['fechaNacimiento'];
$password = $data['password']; 

if (!empty($password)) {
   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE usuario SET 
              nombre = ?,
              apellidos = ?,
              fecha_nacimiento = ?,
              contra = ?
            WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header('Content-Type: application/json');
        echo json_encode(["success" => false, "message" => "Error al preparar la consulta: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("sssss", $nombre, $apellidos, $fechaNacimiento, $hashedPassword, $username);
} else {
   
    $sql = "UPDATE usuario SET 
              nombre = ?,
              apellidos = ?,
              fecha_nacimiento = ?
            WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header('Content-Type: application/json');
        echo json_encode(["success" => false, "message" => "Error al preparar la consulta: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("ssss", $nombre, $apellidos, $fechaNacimiento, $username);
}

if ($stmt->execute()) {
    $response = ["success" => true, "message" => "Usuario actualizado correctamente"];
} else {
    $response = ["success" => false, "message" => "Error al actualizar usuario: " . $stmt->error];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
