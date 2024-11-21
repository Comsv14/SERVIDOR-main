<?php
/* Almacena en un array los 10 primeros números pares. Imprímelos cada uno en
una línea
*/

$pares = array();

for ($i=0; $i < 10; $i++) { 
    $pares[]=$i*2;
}

foreach ($pares as $par) {
    echo "<br>";
    echo $par;
}
?>