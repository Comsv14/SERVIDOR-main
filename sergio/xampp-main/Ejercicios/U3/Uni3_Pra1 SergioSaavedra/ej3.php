<?php
/*
Almacena en un array los 10 primeros números pares. Imprímelos cada uno en
una línea.
*/
$M = array(1,2,3,4,5,6,7,8,9,10);
$n = 0;
for ($i=1; $n<count($M); $i++) {

    if ($i%2 == 0) {
        $M[$n] = $i;
        echo "$i <br>";
        $n++;
    }

}
?>