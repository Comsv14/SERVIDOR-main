<?php
    /*
        Llenar una matriz de 20x20 con valores aleatorios. Sumar las columnas e
        imprimir la columna que tuvo la máxima suma y la suma de esa columna.
    */

    $M = array();

    for ($i = 0; $i < 20; $i++) {
        $M[$i] = array_fill(0, 20, 0);
    }
    $maximo = 0;
    $maxColumna = 0;

    foreach ($M as $i => $fila) {
        $sum = 0;
        $tempJ = 0;
        foreach ($fila as $j => $valor) {
            $M[$i][$j] = mt_rand(1, 10);
            //$M[$j][$i] 

            $sum = $sum + $M[$j][$i];
            $tempJ = $i;
        }

        if ($sum>$maximo) {
            $maximo = $sum;
            $maxColumna = $tempJ;
        }


    }
    echo "La suma maxima es ".$maximo;
    echo "<br> Columna: ";
    foreach ($M as $i => $fila) {
        echo $M[$i][$maxColumna]." ";
    }


?>