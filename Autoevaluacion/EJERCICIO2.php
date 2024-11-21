<?php
session_start();
$_SESSION['decimalcorrecto'] = 0; 
$bin = [rand(0, 1), rand(0, 1), rand(0, 1), rand(0, 1)];
$potencias = [8, 4, 2, 1];


for ($i = 0; $i < 4; $i++) {
    if ($bin[$i] == 1) {
        $_SESSION['decimalcorrecto'] += $potencias[$i];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Binario</title>
</head>
<body>
    <h1>Adivina el número decimal</h1>
    <h2>El número en BINARIO es: 
    <?php
    foreach ($bin as $bit){
        echo $bit;
    }
    echo '<br></br>';
    for ($i = 0; $i < 4; $i++) {
        if ($bin[$i] == 1) {
            switch ($potencias[$i]) {
                case 1:
                    echo '<img src="Uno.jpg" alt="1">';
                    break;
                case 2:
                    echo '<img src="dos.JPG" alt="2">';
                    break;
                case 4:
                    echo '<img src="cuatro.JPG" alt="4">';
                    break;
                case 8:
                    echo '<img src="ocho.JPG" alt="8">';
                    break;
                default:
                    break;
            }
        } else {
            echo '<img src="blanco.JPG" alt="0">';
        }
    }
    ?>
    </h2>
    <form action="EJERCICIO21.php" method="post">
        <label for="numdecimal">Número decimal:</label>
        <input type="text" id="numdecimal" name="numdecimal" required>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
