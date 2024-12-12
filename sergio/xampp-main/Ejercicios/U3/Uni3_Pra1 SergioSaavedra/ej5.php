<?php
    /*
        Generar de forma aleatoria una matriz de 3x5 con valores numéricos.
            a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
            b. Igual al anterior pero por columna.
    */

    $M = array(
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0)
    );

    //generar

    echo "Por fila: "; 

    for ($i = 0; $i<3; $i++) {
        for ($f = 0; $f<5; $f++) {
            $M[$i][$f] = mt_rand(0, 10);
            //a
            echo $M[$i][$f]." "; 
        }
    }
    echo "<br>"; 
    // b
    echo "Por columna: "; 
    for ($i = 0; $i<5; $i++) {
        for ($f = 0; $f<3; $f++) {
            
            
            echo $M[$f][$i]." "; 
        }
    }
    
    
?>