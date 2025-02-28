<?php
session_start();
require 'conexion.php'; 

// Verificar conexión
if ($conexion->connect_error) die("Fatal Error");


    // Consulta para obtener las imagenes
    $query = "SELECT imagen FROM imagenes";
    $result = $conexion->query($query);
    if (!$result) die("Fatal Error");

   

    
        $nombre= $_POST['nombre'];
        // Consulta para obtener a la persona
        $query = "SELECT idpersona FROM personas WHERE nombre==$nombre";
        $resultadod = $conexion->query($query);
     
      

        $query = "SELECT idpersona, idimagen FROM agenda WHERE idpersona==";
        $resultado = $conexion->query($query);
        if (!$resultado) die("Fatal Error");
    

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
<h1>Listado de pictogramas</h1>
    <table>
        <?php
             $cont=0;
            while ($row = $result->fetch_assoc()) {
                $imagen=htmlspecialchars($row['imagen']);
                echo "<td>";
                echo "<img src=$imagen>";
                echo "<p>['$imagen']</p>";
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
    <div>
    </div>
</body>
</html>

<?php
    // Cerrar la conexión con la base de datos
    $conexion->close();
    // ['$imagen'] esto esta bien
?>

