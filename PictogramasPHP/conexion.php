<?php
$servidor = "localhost";
$usuario = "root"; 
$clave = ""; 
$base_datos = "pictogramasphp"; 

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
