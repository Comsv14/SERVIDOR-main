<?php
    include_once 'Vehiculo.php';
    include_once 'Camion.php';
    include_once 'Coche.php';
    include_once 'Dos_ruedas.php';
    include_once 'Cuatro_ruedas.php';
    $coche = new Coche("verde",2100,4);
    $coche->añadir_cadenas_nieve(2);
    $coche->añadir_persona(80);
    $coche->repintar("azul");
    $coche->quitar_cadenas_nieve(4);
    $coche->repintar("negro");
    $coche->ver_atributo($coche);
?>