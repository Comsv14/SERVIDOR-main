<?php
$mascotas = array(
    'perro' => array(
                    'Mastin' => "Yunito",
                    'Salchicha' => "Fuet",
                    'Chiguagua' => "Sarnoso",
    ),
    $gatos= array(
                    'Persa' => "Otis",
                    'Comun' => "Garfield",
                    'Siames' => "Bappeh"
                )
            );
 		foreach($mascotas as $animal => $tipo){
            echo $animal.": </br>";
            foreach ($tipo as $raza => $nombre){
                echo $raza.": ". $nombre."</br>";
            }
        
        }
?>