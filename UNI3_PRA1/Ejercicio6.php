<?php
/* Generar de forma aleatoria una matriz de 4*5 con valores numéricos, determinar
fila y columna del elemento mayor.*/
$filas = 4;
$columnas = 5;
$matriz = [];
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $matriz[$i][$j] = rand(1, 100); 
    }
}
echo "Matriz generada:", "<br>";
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        echo $matriz[$i][$j] . "\t";
    }
    echo "<br>";
}
$maxValor = $matriz[0][0];
$maxFila = 0;
$maxColumna = 0;
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        if ($matriz[$i][$j] > $maxValor) {
            $maxValor = $matriz[$i][$j];
            $maxFila = $i;
            $maxColumna = $j;
        }
    }
}
echo "\nEl valor máximo es: $maxValor\n";
echo "Se encuentra en la fila: " . ($maxFila + 1) . " y columna: " . ($maxColumna + 1) . "\n";
?>