<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio21</title>
</head>
<body>
<?php
session_start(); 

if (isset($_SESSION['decimalcorrecto'])) {
    $decimalcorrecto = $_SESSION['decimalcorrecto']; 
    $numerodecimal = $_POST['numdecimal']; 

    
    if ($numerodecimal == $decimalcorrecto) {
        echo "<p>¡Respuesta acertada! El número es $decimalcorrecto.</p>";
    } else {
        echo "<p>Has fallado, vuelve a jugar.</p>";
    }
    echo '<a href="ejercicio2.php">VOLVER A JUGAR</a>';
} else {
    
    echo "<p>Error: No se pudo recuperar el número correcto. Por favor, regresa a la página anterior.</p>";
}
?>
</body>
</html>
