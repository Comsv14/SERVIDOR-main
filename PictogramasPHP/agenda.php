<?php
session_start();
require 'conexion.php'; 

// Verificar conexión
if ($conexion->connect_error) die("Fatal Error");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
    </style>
</head>
<body>
<h1>Ver agenda</h1>
<form action="datosagenda.php" method="post">
        <label><strong>Fecha:</strong></label>
        <input type="date" id="fecha" name="fecha" required><br>
        <label for="text"><strong>Persona:</strong></label>
        <input type="text" id="nombre" name="nombre" required><br>
        <input type="submit"><a href=catalogo.php>Volver al listado</a>
    </form>
   
</body>
</html>

<?php
    // Cerrar la conexión con la base de datos
    $conexion->close();
    // ['$imagen'] esto esta bien
?>
