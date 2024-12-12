<?php 
    session_start();
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");
    $nombre = $_SESSION['nombre'];
    $login = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php
            $solucion = $_POST['solucion'];
            $fecha='12-12-2024';
            $query = "INSERT INTO respuestas (fecha,login,hora, respuesta) VALUES ('$nombre', '$login', '$fecha', $solucion)";
            $result = $connection->query($query);
            if (!$result) die("Fatal Error");
        
        $connection->close();
        
    ?>
    <p>Se han grabado los <?php echo  $_SESSION['contador']+1;?> contactos de <?php echo  $_SESSION['usu'];?></p>
    <a href="index.php">Volver a loguearse</a><br>
    <a href="inicio.php">Introducir más contactos para <?php echo  $_SESSION['usu'];?></a><br>
    <a href="totales.php">Total de contactos guardados</a><br>
    
</body>
</html>