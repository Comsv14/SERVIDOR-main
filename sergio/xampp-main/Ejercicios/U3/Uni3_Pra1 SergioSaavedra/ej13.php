<?php
    /*
        Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York,
        Los Ángeles y Chicago, sin asignar índices al array. A continuación, muestra el
        contenido del array haciendo un recorrido diciendo el valor correspondiente a
        cada índice, ejemplo:
            La ciudad con el índice 1 tiene el nombre de Barcelona.
    */

    $ciudades = array("Madrid", "Barcelona", "Londres", "New York", "Los Ángeles", "Chicago");

    foreach ($ciudades as $clave => $valor) {
        
        echo "La ciudad con el índice ".$clave." tiene el nombre de ".$valor."<br>";
        
    }
?>