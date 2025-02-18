<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "diabetesdb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>