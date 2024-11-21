<?php
    /*
        Construir  una  calculadora,  se  ha  de  resolver  con  dos  script,  el  primero  muestra  el 
        formulario y el segundo el resultado. Al pulsar el botón ENVIAR se mostrará la suma 
        de los valores introducidos en las cajas de texto.
    */



    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $suma = $num1 + $num2;
    echo "La suma de ".$num1." + ".$num2. " = ".$suma;
?>