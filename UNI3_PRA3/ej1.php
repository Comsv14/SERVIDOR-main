<?php
/* Crea una función para resolver la ecuación de segundo grado. Esta función recibe
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
soluciones reales, devuelve FALSE.  */



include 'matematicas.php';


$coeficientes = [1, -3, 2]; 
$soluciones = ecuacion($coeficientes[0], $coeficientes[1], $coeficientes[2]);

if ($soluciones === false) {
    echo "No hay soluciones reales.\n";
} else {
    echo "Las soluciones son: " . implode(", ", $soluciones) . "\n";
    echo "<br>";
    var_dump ($soluciones);
}


?>