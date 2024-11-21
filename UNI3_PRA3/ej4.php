<?php

/*Escribe una función que reciba un array de números, y un número, el límite. La
función tiene que devolver un nuevo array que contenga solo los elementos del
array original menores que el límite.*/

include 'matematicas.php';
    $numeros = [17, 4, 3, 7, 11, 5];
    $limite = 10;
    
    $resultado = ej4($numeros, $limite);
    echo "Las soluciones son: " . implode(", ", $resultado) . "\n";
    echo "<br>";
    var_dump($resultado);
    
    
?>