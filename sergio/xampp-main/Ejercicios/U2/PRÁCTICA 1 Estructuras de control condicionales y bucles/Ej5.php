<?php
/*
    Crear un programa partir de 3 valores, a b y c que corresponden a los tres
    coeficientes de una ecuación de segundo grado muestre las soluciones de la
    misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
         si b2-4ac es negativo no hay soluciones
         si es nulo, hay sólo una solución -b/2a
         si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-b-sqrt(b2-4ac))/(2a)

*/

$a=1;
$b=-5;
$c=6;

if ((($b**2)-(4*$a*$c))<0) {
    echo "No hay solucion real";
} elseif ((($b**2)-(4*$a*$c))==0) {
    $x = -$b/2*$a;
    echo "X= $x";
} else {
    $x1 = (-$b+sqrt($b**2-4*$a*$c))/(2*$a);
    $x2 = (-$b-sqrt($b**2-4*$a*$c))/(2*$a);
    echo "X1= $x1 <br>";
    echo "X2= $x2 <br>";
}
?>