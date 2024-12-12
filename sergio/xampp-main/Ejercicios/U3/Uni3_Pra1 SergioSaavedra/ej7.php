<?php
    /*
        Generar una matriz de 3x4 y generar un vector que contenga los valores máximos
        de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
        vectores a razón de uno por renglón.
    */

    $M = array(
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0)
    );

    $maximos = array(0,0,0);
    $promedios = array(0,0,0);

    foreach ($M as $i => $fila) {
        foreach ($fila as $j => $valor) {
            $M[$i][$j] = mt_rand(1, 10);
        }

        $maximoFila = max($M[$i]);
        $promedioFila = array_sum($M[$i]) / count($M[$i]);

        $maximos[$i] = $maximoFila;
        $promedios[$i] = $promedioFila;

    }
    echo "Maximos: ";
    foreach ($maximos as $i => $valor) {
        echo $maximos[$i]." ";
    }

    echo "<br> Promedios: ";


    foreach ($promedios as $i => $valor) {
        echo $promedios[$i]." ";
    }


    
    //echo var_dump($M);
?>