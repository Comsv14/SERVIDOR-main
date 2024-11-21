<?php
/*
Crea una función para resolver la ecuación de segundo grado. Esta función recibe
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
soluciones reales, devuelve FALSE.
*/
function ecuacion($a,$b,$c) {
    /*
        $a=1;
        $b=2;
        $c=-3; 
    */
    // Verificar que a no sea cero
    if ($a == 0) {
        echo("El coeficiente 'a' no puede ser cero en una ecuación de segundo grado.");
    }
    $resultado = ($b * 2) - (4 * $a * $c);
    if ($resultado < 0) {
        return false; // No hay soluciones
    } elseif ($resultado == 0) {
        $x = -$b / (2 * $a);
        return [$x]; 
    } else {
        $x1 = (-$b + sqrt($resultado)) / (2 * $a);
        $x2 = (-$b - sqrt($resultado)) / (2 * $a);
        return [$x1, $x2]; 
    }
}
//echo "Primer resultado: ",ecuacion(1,2,-3)[0],"</br>","Segundo resultado: ", ecuacion(1,2,-3)[1];
?>