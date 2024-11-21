<?php
/* 
Repite el ejercicio anterior pero ahora si se han de crear índices asociativos,
ejemplo:
El índice del array que contiene como valor Madrid es MD. 
*/


$ciudades = array(
    "MD" => "Madrid",
    "BC" => "Barcelona",
    "LD" => "Londres",
    "NY" => "New York",
    "LA" => "Los Ángeles",
    "CH" => "Chicago"
);


foreach ($ciudades as $indice => $ciudad) {
    echo "El índice del array que contiene como valor $ciudad es $indice<br>";
}
?>