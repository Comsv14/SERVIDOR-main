<?php
    /*

    */

    $mascotas = array(
        'Perro' => array('Mastin' => "Yunito",'Salchicha' => "Fuet", 'Chiguagua' => "Sarnoso"),
        'Gato' => array('Persa' => "Otis", 'Comun' => "garfield", 'Siames' => "Princesa")
    );

    foreach($mascotas as $animal => $tipo) {
        echo $animal.": <br>";
        foreach($tipo as $raza => $nombre)
            echo $raza.": ".$nombre."<br>";
    }
    ;
?>