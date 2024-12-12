<?php
    /*
        Dados 3 números asignados dentro del código a mostrar el número mayor de los
        tres.
    */
    $num1 = 5;
    $num2 = 6;
    $num3 = 5;
    if ($num1 >= $num2 && $num1 >= $num3) {
        $resul = $num1;
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        $resul = $num2;
    } else {
        $resul = $num3;
    }

    echo $resul;
?>