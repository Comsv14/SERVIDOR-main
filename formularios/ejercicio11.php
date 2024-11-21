<?php
session_start();

// Generar un número binario de 4 dígitos aleatorio
$numeroBinario = str_pad(decbin(rand(0, 15)), 4, "0", STR_PAD_LEFT);
$_SESSION["numeroBinario"] = $numeroBinario;

// Convertir el número binario a decimal
$numeroDecimal = bindec($numeroBinario);
$_SESSION["numeroDecimal"] = $numeroDecimal;

function mostrarCarta($bit) {
    if ($bit == "1") {
        echo "<img src='carta_roja.png' alt='Carta Roja' width='50' height='75'>";
    } else {
        echo "<img src='carta_negra.png' alt='Carta Negra' width='50' height='75'>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina el número en decimal</title>
</head>
<body>
    <h1>Adivina el número en decimal</h1>
    <p>El número en BINARIO: <?php echo $numeroBinario; ?></p>

    <div>
        <?php
        // Representar gráficamente las cartas según el número binario
        for ($i = 0; $i < 4; $i++) {
            mostrarCarta($numeroBinario[$i]);
        }
        ?>
    </div>

    <form action="ejercicio21.php" method="post">
        <label for="respuesta">Número decimal:</label>
        <input type="number" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>



<?php
session_start();

$respuestaUsuario = $_POST["respuesta"];
$numeroCorrecto = $_SESSION["numeroDecimal"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <?php
    if ($respuestaUsuario == $numeroCorrecto) {
        echo "<h2>Respuesta acertada, el número es $numeroCorrecto</h2>";
    } else {
        echo "<h2>Has fallado, vuelve a jugar</h2>";
    }
    ?>
    <a href="ejercicio2.php">VOLVER A JUGAR</a>
</body>
</html>