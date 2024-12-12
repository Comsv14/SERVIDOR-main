<?php
    /*
        Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados
        mostrar en un renglón los elementos almacenados en la diagonal principal y en el
        siguiente los de la diagonal secundaria.
    */

    $M = array(
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0)
    );

    for ($i = 0; $i<4; $i++) {
        for ($f = 0; $f<4; $f++) {
            $M[$i][$f] = mt_rand(0, 10);
        }
        echo $M[$i][$i]." " ;
    }

    echo "<br>";

    for ($i = 0; $i<4; $i++) {
        
        
        echo $M[$i][3-$i]." " ;
    }

    echo "<br>";

    //echo var_dump($M);

    
?>