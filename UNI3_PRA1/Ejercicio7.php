<?php
/* Generar una matriz de 3x4 y generar un vector que contenga los valores máximos
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
vectores a razón de uno por renglón.*/

// Generar la matriz de 3x4
$matriz = [
    [5, 3, 9, 1],
    [8, 6, 2, 7],
    [4, 9, 1, 10]
];

// Inicializar los vectores para almacenar los máximos y los promedios
$valores_maximos = [];
$promedios = [];

// Recorrer la matriz para obtener los valores máximos y los promedios
foreach ($matriz as $fila) {
    // Obtener el valor máximo de la fila
    $maximo = max($fila);
    // Calcular el promedio de la fila
    $promedio = array_sum($fila) / count($fila);
    
    // Guardar los resultados en los vectores
    $valores_maximos[] = $maximo;
    $promedios[] = $promedio;
}

// Imprimir los vectores
echo "Valores máximos de cada fila: ". "<br>";
foreach ($valores_maximos as $max) {
    echo $max . " ";
}
echo  "<br>";
echo "Promedios de cada fila: ". "<br>";
foreach ($promedios as $promedio) {
    echo $promedio . " ";
}
?>
