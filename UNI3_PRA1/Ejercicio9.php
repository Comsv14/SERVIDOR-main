<?php
/* Llenar una matriz de 20x20 con valores aleatorios. Sumar las columnas e
imprimir la columna que tuvo la máxima suma y la suma de esa columna*/

// Definir las dimensiones de la matriz
$filas = 20;
$columnas = 20;

// Inicializar la matriz vacía
$matriz = [];

// Llenar la matriz con valores aleatorios entre 0 y 100
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $matriz[$i][$j] = rand(0, 100);
    }
}

// Inicializar un arreglo para almacenar las sumas de las columnas
$suma_columnas = array_fill(0, $columnas, 0);

// Sumar las columnas
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $suma_columnas[$j] += $matriz[$i][$j];
    }
}

// Encontrar la columna con la suma máxima
$max_suma = PHP_INT_MIN;
$columna_max = 0;

for ($j = 0; $j < $columnas; $j++) {
    if ($suma_columnas[$j] > $max_suma) {
        $max_suma = $suma_columnas[$j];
        $columna_max = $j;
    }
}

// Imprimir la matriz (opcional, para verificar los datos)
echo "Matriz 20x20:\n";
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        echo str_pad($matriz[$i][$j], 4, " ", STR_PAD_LEFT); // Imprimir con formato
    }
    echo  "<br>";
}

// Imprimir la columna con la suma máxima y su valor
echo "\nLa columna con la suma máxima es la columna $columna_max con una suma de $max_suma" .  "<br>";
?>



