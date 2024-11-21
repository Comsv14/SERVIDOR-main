<?php
/*
    Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados
    mostrar en un renglón los elementos almacenados en la diagonal principal y en el
    siguiente los de la diagonal secundaria.
*/
$matriz=array();

    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $matriz[$i][$j] = rand(0, 10);
        }
    }
    //visualizar
    foreach ($matriz as $fila => $columna) {
        foreach ($columna as $key => $numero) {
            echo "($numero)";
        }
        echo"</br>";
    }
    //
    echo"hola";
    $tamano = count($matriz);
    echo"Principal: ";
    for ($i = 0; $i < $tamano; $i++) {
        $principal=$matriz[$i][$i];//principal
        echo $principal." ";
    }
    echo"Secundaria: ";
    for ($i = 0; $i < $tamano; $i++) {
        $secundaria=$matriz[$i][$tamano - $i - 1];//secundaria
        echo $secundaria." ";
    }

?>