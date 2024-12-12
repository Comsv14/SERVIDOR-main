<?php
    /*
        Realizar un programa que muestre las películas que se han visto. Crear un array
        que contenga los meses de enero, febrero, marzo y abril, asignando los valores
        9,12,0 y 17 respectivamente. Si en alguno de los meses no se ha visto alguna
        película no ha de mostrar la información de ese mes.
    */
    $M = array(
        'enero' => 9,
        'febrero' => 12,
        'marzo' => 0,
        'abril' => 17
    );

    foreach ($M as $mes => $valor) {
        if ($valor != 0) {
            echo $mes.": ".$valor." peliculas <br>";
        }
    }

?>