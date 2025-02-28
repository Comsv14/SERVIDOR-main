<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "diabetesdb";
$conn = new mysqli($servername, $username, $password, $dbname);
/* 4)QBCzWL5@6ms9fF 
$servername = "4597267_diabetesdb";
$username = "root";
$password = "";
$dbname = "diabetesdb";
*/
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>