<?php
/*
Repite  el  ejercicio  anterior  pero  ahora  
si  se  han  de  crear  índices  asociativos, 
ejemplo: 
El índice del array que contiene como valor Madrid es MD.
*/
$ciudades = array(
    'MD'=>'Madrid',
    'BAR'=>'Barcelona',
    'LON'=>'Londres',
    'NY'=>'New York',
    'LA'=>'Los Ángeles',
    'CHI'=>'Chicago'
);
foreach ($ciudades as $ciudad => $nombre) {
    echo "CIUDAD: ".$ciudad." NOMBRE: ".$nombre."</br>"; 
}
?>