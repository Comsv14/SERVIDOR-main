<?php

$matriz = array();

// Rellenamos la matriz con números aleatorios
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(0, 9);
    }
}
// Visualizamos la matriz
echo "Matriz:<br>";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo "(" . $matriz[$i][$j] . ")";
    }
    echo "<br>";
}

$maximos = array();
$promedios = array();

for ($i = 0; $i < 3; $i++) {
    $maximos[$i] = max($matriz[$i]); // Valor máximo de la fila
    $promedios[$i] = array_sum($matriz[$i]) / count($matriz[$i]); // Promedio de la fila (Promedio=suma de todo/el numero de columnas)
}
echo "Valores máximos de cada fila:<br>";
for ($i = 0; $i < 3; $i++) {
    echo $maximos[$i] . "<br>";
}
echo "Promedios de cada fila:<br>";
for ($i = 0; $i < 3; $i++) {
    echo $promedios[$i] . "<br>";
}
?>