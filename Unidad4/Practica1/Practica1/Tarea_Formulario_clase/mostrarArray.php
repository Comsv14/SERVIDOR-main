<?php
if (isset($_POST['dimension'])) {
    $numeroDimensiones = $_POST['dimension'];

    // Mostrar el formulario para los valores de la matriz
    echo '<form action="calcularDiagonales.php" method="post">';
    for ($i = 0; $i < $numeroDimensiones; $i++) {
        echo "<br>";
        for ($j = 0; $j < $numeroDimensiones; $j++) {
            echo <<<END
                <label for="$i,$j">($i,$j):</label>
                <input type="text" id="$i,$j" name="valores[$i][$j]">
            END;
        }
    }
    echo "<br>";
    echo '<input type="submit" name="submit" value="Calcular diagonal">';
    echo '</form>';
} else {
    // Si no hay dimensión, mostrar un formulario para establecerla
    echo '<form method="post" action="">';
    echo 'Dimensión: <input type="number" name="dimension" required>';
    echo '<input type="submit" value="Establecer dimensión">';
    echo '</form>';
}
?>
