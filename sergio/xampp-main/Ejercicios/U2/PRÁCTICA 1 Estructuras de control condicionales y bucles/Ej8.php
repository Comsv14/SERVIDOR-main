<?php
/*
    Calcular si un número entero generado de forma aleatoria entre 1 y 1000 es
    perfecto. Un número perfecto es aquel que la suma de sus divisores es él mismo,
    por ejemplo el 6, sus divisores son 1,2,3 la suma de los mismos es 6.
*/
$num=mt_rand(1,1000);
$divisores=0;
for ($i = $num-1; $i>=1; $i--) {
    if($num%$i == 0){
        $divisores = $divisores + $i;
    }
}

if ($divisores == $num) {
    echo "$num es perfecto";
} else {
    echo "$num es imperfecto";
}
?>