<?php
    require_once 'ej6.php';
    //ej6 Cree un coche verde de 2100 kg con 4 puertas en la página mostrar.php.
    $coche = new Coche("verde",2100,4);

    //ej6 Añada 2 cadenas para la nieve y una persona de 80 kg.
    $coche->añadir_cadenas_nieve(2);
    echo $coche->añadir_persona(80);

    //ej6 Cambie el color del coche a azul
    $coche->repintar("azul");


    //ej6 Quite 4 cadenas para la nieve.
    $coche->quitar_cadenas_nieve(4);

    //ej6 Vuelva a pintar el coche en color negro.
    $coche->repintar("negro");

    //ej6 Muestre todos los atributos del coche y el número de veces que se cambia el color con el método ver_atributo($objeto).
    $coche->ver_atributo($coche);
    echo "<br>El color se ha cambiado ".$coche->getNumero_cambio_color()." veces";


?>