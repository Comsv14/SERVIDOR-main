<?php
    /*
        Realiza el ejercicio anterior pero con la funicón array_push().
    */
    
    $a = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $b = array("12", "34", "45", "52", "12");
    $c = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");

    $M = array(); 

    array_push($M, $a, $b, $c);
 
    print_r($M);
    
    foreach ($M as $array => $clave) {
        foreach ($clave as $valor) {
            echo $valor." ";
        }  
        
    }
    
?>