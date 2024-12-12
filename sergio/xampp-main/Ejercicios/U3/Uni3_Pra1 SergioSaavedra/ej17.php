<?php
    /*
        Rellena los siguientes tres arrays y júntalos en uno nuevo. Muéstralos por
        pantalla. Utiliza la función array_merge()
            "Lagartija", "Araña", "Perro", "Gato", "Ratón"
            "12", "34", "45", "52", "12"
            "Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34"
    */

    $a = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $b = array("12", "34", "45", "52", "12");
    $c = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");

    $M = array_merge($a, $b, $c);

    foreach ($M as $valor) {
        echo $valor." ";
    }
?>