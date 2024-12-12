<?php
    /*
        Muestra el array del ejercicio anterior pero en orden inverso
    */
    $a = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $b = array("12", "34", "45", "52", "12");
    $c = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");

    $M = array(); 

    array_push($M, $a, $b, $c);
 
    //print_r($M);
    
    foreach ($M as $array => $clave) {
        foreach ($clave as $valor) {
            echo $valor." ";
        }  
        
    }

    $invM = array_reverse($M);
    echo "<br>";

    foreach ($invM as $array => $clave) {
        $clave = array_reverse($clave);
        foreach ($clave as $valor) {
            echo $valor." ";
        }  
        
    }
?>