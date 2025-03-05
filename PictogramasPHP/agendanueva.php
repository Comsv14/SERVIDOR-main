<?php
session_start();
require 'conexion.php'; 

// Verificar conexión
if ($conexion->connect_error) die("Fatal Error");
// Consulta para obtener las imagenes 
$query = "SELECT imagen FROM imagenes";
$result = $conexion->query($query);
if (!$result) die("Fatal Error");

if (isset($_POST['nombre'])) {
$nombre= $_POST['nombre'];
// Consulta para obtener a la persona
$query = "SELECT idpersona FROM personas WHERE nombre==$nombre";
$nombre = $conexion->query($query);
if (!$result) die("Fatal Error");


// consulta para insertar en la agenda
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$connection->query("INSERT INTO agenda (fecha,hora, idpersona, imagen) 
                    VALUES ($fecha, '$hora', '$idpersona', '$imagen')");

$connection->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadística</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .bar {
            background-color: blue;
            height: 20px;
        }
        img{
            width: 100px ;
            height: 75px;
        }
    </style>
</head>
<body>
<h1>Añadir datos agenda</h1>
   
<form action="#" method="post">
        <label><strong>Fecha:</strong></label>
        <input type="date" id="fecha" name="fecha" required><br>
        <label><strong>Hora:</strong></label>
        <input type="time" id="hora" name="hora"><br>
        <label><strong>Persona: </strong></label>
        <input type="text" id="nombre" name="nombre" required><br>
    </form>

<table>
        <?php
             $cont=0;
            while ($row = $result->fetch_assoc()) {
                $imagen=htmlspecialchars($row['imagen']);
                echo "<td>";
                echo "<img src=$imagen>";
                echo "<input type='radio'>['$imagen']</input>";
                echo "</td>";
                $imagen=htmlspecialchars($row['imagen']);
                $cont++;

                if($cont%4==0){
                    echo '</tr></tr>';
                }
            }
        ?>
    </table>
    <br>
    <input type="submit" value="Añadir entrada en agenda"><a href=catalogo.php>Volver al listado</a>
    <div>
    </div>
</body>
</html>

<?php
    // Cerrar la conexión con la base de datos
    $conexion->close();
    // ['$imagen'] esto esta bien
?>
