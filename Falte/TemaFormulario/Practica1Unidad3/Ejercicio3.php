<?php
    /*
        Almacena en un array los 10 primeros números pares. 
        Imprímelos cada uno en una línea.
    */
    $pares=array();
    $cont=0;
    for ($i=0; $i <= 10; $i++) { 
        $pares[$i]=$cont;
        echo " $pares[$i]";
        $cont+=2;
    }
?>