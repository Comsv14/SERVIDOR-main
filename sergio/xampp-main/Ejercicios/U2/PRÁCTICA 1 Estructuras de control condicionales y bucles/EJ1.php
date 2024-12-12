
<?php
    /*
        Dados 2 números asignados dentro del código a variables realizar el siguiente
        cálculo: si son iguales que los multiplique, si el primero es mayor que el segundo
        que los reste y si no que los sume. Mostrar el resultado en pantalla.
    */
    $num1 = 2;
    $num2 = 3;
    if ($num1 == $num2) {
        $resul = $num1 * $num2;
    } elseif ($num1 > $num2) {
        $resul = $num1 - $num2;
    } else {
        $resul = $num1 + $num2;
    }

    echo $resul;
?>