<?php
    /*
        Crea una matriz para guardar a los amigos clasificados por diferentes ciudades.
        Los valores serán los siguientes:
            En Madrid: nombre Pedro, edad 32, teléfono 91-999.99.99 
            En Barcelona: nombre Susana, edad 34, teléfono 93-000.00.00 
            En Toledo: nombre Sonia, edad 42, teléfono 925-09.09.09
        Haz un recorrido del array multidimensional mostrando los valores de tal manera
        que nos muestre en cada ciudad que amigos tiene
    */

    $amigos = array(
        "Madrid" => array(
            "Nombre" => "Pedro",
            "Edad" => 32,
            "Teléfono" => "91-999.99.99"
        ),
        "Barcelona" => array(
            "Nombre" => "Susana",
            "Edad" => 34,
            "Teléfono" => "93-000.00.00"
        ),
        "Toledo" => array(
            "Nombre" => "Sonia",
            "Edad" => 42,
            "Teléfono" => "925-09.09.09"
        )
    );
    echo "<ul>";
    foreach ($amigos as $ciudad => $dato) {
        echo "<li>".$ciudad.": </li> <ul>";
        
        foreach ($dato as $tipo => $valor) {
            echo "<li>".$tipo.": ".$valor."</li>";
        }
        echo "</ul>";
    }
    echo "</ul>";
?>