<?php
/* 
Realizar un programa que muestre las películas que se han visto. Crear un array
que contenga los meses de enero, febrero, marzo y abril, asignando los valores
9,12,0 y 17 respectivamente. Si en alguno de los meses no se ha visto alguna
película no ha de mostrar la información de ese mes*/

$peliculas_vistas = array(
    "Enero" => 9,
    "Febrero" => 12,
    "Marzo" => 0,
    "Abril" => 17
);


foreach ($peliculas_vistas as $mes => $cantidad) {
    if ($cantidad > 0) {
        echo "En el mes de $mes se vieron $cantidad películas.<br>";
    }
}
?>