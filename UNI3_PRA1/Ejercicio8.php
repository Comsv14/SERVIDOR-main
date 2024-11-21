<?php
/* Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
determine la posición [fila, columna] del número mayor almacenado en la matriz.*/

// Definir las dimensiones de la matriz
$filas = 10;
$columnas = 10;

// Inicializar la matriz vacía
$matriz = [];

// Llenar la matriz con valores aleatorios entre 0 y 100
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $matriz[$i][$j] = rand(0, 100);
    }
}

// Inicializar variables para almacenar el mayor valor y su posición
$maximo_valor = PHP_INT_MIN; // Valor mínimo posible para empezar
$posicion_max = [0, 0]; // Inicialmente [fila, columna]

// Recorrer la matriz para encontrar el valor máximo y su posición
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        if ($matriz[$i][$j] > $maximo_valor) {
            $maximo_valor = $matriz[$i][$j];
            $posicion_max = [$i, $j]; // Guardar la posición [fila, columna]
        }
    }
}

// Imprimir la matriz (opcional, para verificar los datos)
echo "Matriz 10x10:\n";
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        echo str_pad($matriz[$i][$j], 4, " ", STR_PAD_LEFT); // Imprimir con formato
    }
    echo  "<br>";
}

// Imprimir el resultado
echo "\nEl valor máximo es $maximo_valor en la posición [fila, columna]: [" . $posicion_max[0] . ", " . $posicion_max[1] . "]\n";
?>

