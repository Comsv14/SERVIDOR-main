<?php
    /*
        Crea una función para resolver la ecuación de segundo grado. Esta función recibe
        los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
        soluciones reales, devuelve FALSE.
    */

    function segundoGrado($a, $b, $c) {
        if ($b**2-4*$a*$c < 0) {
            return false;
        } else {
            $x1 = (-$b+sqrt($b**2-4*$a*$c))/2*$a;
            $x2 = (-$b-sqrt($b**2-4*$a*$c))/2*$a;

            return array($x1,$x2);
        }
    }

    // 1,-5,6
    // 1,4,5
    // 1,-6,9

    $resultado = segundoGrado(1,-6,9);


    if (!$resultado) {
        echo "La ecuacion no tiene soluciones reales";
    } else {
        echo "x1 = ".$resultado[0]."<br> x2 = ".$resultado[1];
    }
   

    
?>