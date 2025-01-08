<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        img{
            width: 534px;
            height: 476px;
        } 
    </style>
</head>
<body>
<h2>Bienvenido, <?php 
    echo $_SESSION['nombre'];?>!</h2>

    <img src="20241212.jpg">
    <br></br>
    <form action="solucion.php" method="post">
    <p>Solución jeroglifico  <input type="text" id="solucion" name="solucion"></input></p>
    <input type="submit" value="Enviar" name="submit">
    <br></br>
    <?php
    if(isset($_POST['solucion'])){
    $solucion=$_POST['solucion'];
    $nombre=$_SESSION["nombre"];
    $query = "INSERT INTO jugador (nombre, respuesta) VALUES ($nombre, $solucion)";
}
    ?>
    </form>
    <a href='puntos.php'>Ver puntos por jugador</a>
    <br></br>
    <a href='resultado.php'>Resultados del Dia</a>
</body>
</html>
