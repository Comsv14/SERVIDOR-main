<?php
$color = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : "white";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color = $_POST['color'];
    setcookie("bgcolor", $color, time() + (86400 * 30)); 
    echo "Se crea la cookie. <a href='cookies2.php'>Ir a la otra web</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Color</title>
</head>
<body style="background-color: <?= $color ?>;">
    <form method="post">
        <p>Seleccione de qué color desea que sea la web de ahora en adelante:</p>
        <input type="radio" name="color" value="red" id="rojo" <?= $color == "red" ? "checked" : "" ?>>
        <label for="rojo">Rojo</label><br>
        <input type="radio" name="color" value="green" id="verde" <?= $color == "green" ? "checked" : "" ?>>
        <label for="verde">Verde</label><br>
        <input type="radio" name="color" value="blue" id="azul" <?= $color == "blue" ? "checked" : "" ?>>
        <label for="azul">Azul</label><br><br>
        <button type="submit">Crear cookie</button>
    </form>
</body>
</html>