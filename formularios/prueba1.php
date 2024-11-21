<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar un array para los resultados en binario
    $resultadosBinarios = [];

    // Recorrer cada valor del formulario
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $valor = $_POST["E{$i}_{$j}"];

            // Validar que el valor esté entre 1 y 100
            if ($valor >= 1 && $valor <= 100) {
                // Convertir a binario y guardar en el array
                $resultadosBinarios["E{$i}_{$j}"] = decbin($valor);
            } else {
                // Mostrar un mensaje si algún valor está fuera del rango
                echo "El valor en E{$i}_{$j} ($valor) no está entre 1 y 100.<br>";
                $resultadosBinarios["E{$i}_{$j}"] = "N/A";
            }
        }
    }

    // Mostrar los resultados en binario
    echo "<h3>Resultados en Binario:</h3>";
    echo "<table border='1'>";
    for ($i = 0; $i < 2; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            echo "<td>{$resultadosBinarios["E{$i}_{$j}"]}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Mostrar el formulario inicial
    ?>

    <form method="post" action="">
        <table border="1">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <label for="E<?php echo $i . '_' . $j; ?>">E<?php echo $i . '.' . $j; ?></label>
                            <input type="number" name="E<?php echo $i . '_' . $j; ?>" min="1" max="100" required>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <button type="submit">Calcular</button>
    </form>

    <?php
}
?>
11

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

