<?php
    /*
        Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
        determine la posición [fila, columna] del número mayor almacenado en la matriz. 
    */
    $matriz = array();
    $mayor=0;
    $contadorFila = 0;
    $contadorColumna = 0;
    // Rellenamos la matriz con números aleatorios
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $matriz[$i][$j] = rand(0, 10000);
        }
    }
    // Visualizamos la matriz
    echo "Matriz:<br>";
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            echo "(" . $matriz[$i][$j] . ")";
            //comprobar el mayor y su posicion
            if ($matriz[$i][$j]>$mayor){
                $mayor=$matriz[$i][$j];
                $contadorFila=$i;
                $contadorColumna=$j;
            }

        }

        echo "<br>";
    }
    echo"Numero mayor ".$mayor."(".$contadorFila.")"."(".$contadorColumna.")"
?>