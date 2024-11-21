<?php
    /*
    Generar de forma aleatoria una matriz de 3x5 con valores numéricos.
        a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
        b. Igual al anterior pero por columna.
    */
    $matriz=array();
    //RELLENAR MATRIZ
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 5; $j++) {
            $matriz[$i][$j] = rand(0, 9);
        }
    }
    //VISUALIZAR FILAS
    echo"a) FILAS:";
    for ($i = 0; $i < 3; $i++) {
        echo" ";
        for ($j = 0; $j < 5; $j++) {
            echo $matriz[$i][$j];
        }
    }
    //VISUALIZAR COLUMNAS
    echo"</br>";
    echo"b) COLUMNAS:";
    for ($i = 0; $i < 5; $i++) {
        echo" ";
        for ($j = 0; $j < 3; $j++) {
            echo $matriz[$j][$i];
        }
    }
    //MOSTRAR MATRIZ ENTERA
    echo"</br>";
    foreach ($matriz as $fila => $columna) {
        foreach ($columna as $key => $numero) {
            echo "($numero)";
        }
        echo"</br>";
    }
?>