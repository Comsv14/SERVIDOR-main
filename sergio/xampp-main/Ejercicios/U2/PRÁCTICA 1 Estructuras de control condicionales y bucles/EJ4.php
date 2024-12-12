<?php
/*
    Identificar entre dos números aleatorios cual es el mayor y si este es par o impar.
    Buscar información previamente para generar números aleatorios y usarla para
    resolver el ejercicio.
*/

$num1 = mt_rand();
$num2 = mt_rand();

if ($num1>$num2) {
    $mayor = $num1;
    $menor = $num2;
} else {
    $mayor = $num2;
    $menor = $num1;
}

if ($mayor%2 == 0) {
    echo "El numero es par <br>";
} else {
    echo "El numero es impar <br>";
}

echo "El numero mayor es $mayor y el menor $menor";
?>