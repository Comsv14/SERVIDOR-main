<?php
/*
    Generar todos los pares de números formados por combinaciones de dígitos del 1
    al 9, siendo además los dos componentes del par distintos
*/
for ($a=1;$a<=9;$a++) {
    for ($b=1; $b<=9; $b++) {
        if ($a!=$b) {
            echo "$a"."$b <br>";
        }
    }
}
?>