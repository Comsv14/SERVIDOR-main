<?php
        /*
            Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
            determine la posición [fila, columna] del número mayor almacenado en la matriz.
        */

    $M = array(
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array()
    );
    $maximo = 0;
    $filaColumna = array(0, 0);



    for ($i = 0; $i < 10; $i++) {
        for ($f = 0; $f < 10; $f++) {
            $M[$i][$f] = mt_rand(0, 10);

            if ($M[$i][$f] > $maximo) {
                $maximo = $M[$i][$f];
                $filaColumna[0] = $i;
                $filaColumna[1] = $f;
            }
        }
    }



    echo "El numero mayor de la matriz es " . $maximo . "<br> Fila: " . $filaColumna[0] . "<br> Columna: " . $filaColumna[1];
?>