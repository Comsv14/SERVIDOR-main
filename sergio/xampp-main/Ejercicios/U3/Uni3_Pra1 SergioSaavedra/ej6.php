<?php
    /*
        Generar de forma aleatoria una matriz de 4*5 con valores numéricos, determinar
        fila y columna del elemento mayor.
    */
    $M = array(
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0)
    );

    $filaColumna = array(0, 0);
    $mayor = 0;

    for ($i = 0; $i<4; $i++) {
        for ($f = 0; $f<5; $f++) {
            $M[$i][$f] = mt_rand(0, 99);
            
            if ($M[$i][$f]>$mayor) {
                $mayor = $M[$i][$f];
                $filaColumna [0] = $i;
                $filaColumna [1] = $f;
            }
        }
    }

    echo "El numero mayor de la matriz es ".$mayor."<br> Fila: ".$filaColumna[0]."<br> Columna: ".$filaColumna[1];
?>