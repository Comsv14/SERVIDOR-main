<?php
$host = "localhost:3307";
$user = "root";
$password = "";
$dbname = "DiabetesDB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
