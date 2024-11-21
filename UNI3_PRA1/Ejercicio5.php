<?php
/*Generar de forma aleatoria una matriz de 3x5 con valores numéricos.
a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
b. Igual al anterior pero por columna.
*/
$num = array();
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 5; $j++) { 
        $num[$i][$j] = rand(0, 10);
    }
}

foreach ($num as $fila) {
    echo $num[$i][$j];
    echo "<br>";
}


?>