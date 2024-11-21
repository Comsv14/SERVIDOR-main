<?php
/* Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados
mostrar en un renglón los elementos almacenados en la diagonal principal y en el
siguiente los de la diagonal secundaria.
*/

$num = array();
for ($i=0; $i < 4; $i++) { 
    for ($j=0; $j < 4; $j++) { 
        $num[$i][$j] = rand(0, 10);
    }
}
foreach ($num as $fila) {
    foreach ($fila as $valor) {
       echo $valor . "\t";
    }
    echo "<br>";
}
echo "Diagonal principal: ";
for ($i=0; $i < 4; $i++) { 
    echo $num[$i][$i] . " ";

}
echo "\n";
echo "<br>";

echo "Diagonal secundaria: ";
for ($i=0; $i < 4; $i++) { 
    echo $num[$i][3- $i] . " ";

}

echo "\n";
?>