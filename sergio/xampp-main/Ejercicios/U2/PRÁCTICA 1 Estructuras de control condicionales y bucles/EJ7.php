<?php
/*
    Hacer un programa que calcule todos los números primos entre 1 y 50 y los
    muestre por pantalla. Un número primo es un número entero que sólo es
    divisible por 1 y por sí mismo.
*/

for ($num=1; $num<=50; $num++) {
    
    $primo = false;
    if ($num <= 1 || ($num>2 && $num%2 == 0)) {
        //echo "$num no es primo";
    } else {
        for ($i = 3; $i<=sqrt($num); $i++) {
            if ($num%$i == 0) {
                $primo = true;
            }
        }

        if ($primo) {
            //echo "$num no es primo";
        } else {
            echo "$num es primo <br>";
        }
    }
}
?>