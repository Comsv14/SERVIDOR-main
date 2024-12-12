<?php
/*
    Escriba un programa a partir de un número entero generado de forma aleatoria
    indique si es primo. Un número primo es aquel que es divisible por el mismo y la
    unidad.
*/
$num = mt_rand();
$primo = false;
    if ($num <= 1 || ($num>2 && $num%2 == 0)) {
        echo "$num no es primo";
    } else {
        for ($i = 3; $i<=sqrt($num); $i++) {
            if ($num%$i == 0) {
                $primo = true;
            }
        }

        if ($primo) {
            echo "$num no es primo";
        } else {
            echo "$num es primo <br>";
        }
    }
?>