<?php
require_once 'conexion.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}


$sql = "SELECT id_usu AS id, usuario AS username, nombre, apellidos, fecha_nacimiento AS fechaNacimiento FROM usuario";
$result = $conn->query($sql);

$usuarios = array();
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
