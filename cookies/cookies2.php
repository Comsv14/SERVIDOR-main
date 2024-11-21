<?php

$color = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : "white";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Cookie</title>
</head>
<body style="background-color: <?= $color ?>;">
    <p>El color de fondo actual es: <?= $color ?></p>
    <a href="cookies.php">Volver al formulario</a>
</body>
</html>