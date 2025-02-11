<?php
session_start();

include 'conexion.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

// Consulta para verificar las credenciales
$sql = "SELECT id_usu FROM USUARIO WHERE usuario = '$usuario' AND contra = '$contra'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario autenticado
    $row = $result->fetch_assoc();
    $_SESSION['id_usu'] = $row['id_usu']; // Guardar ID de usuario en la sesión
    header("Location: formularios/formulario.php"); // Redirigir a la página principal
} else {
    // Credenciales incorrectas
    echo "Usuario o contraseña incorrectos. <a href='index.php'>Inténtalo de nuevo</a>";
}

// Cerrar conexión
$conn->close();
?>