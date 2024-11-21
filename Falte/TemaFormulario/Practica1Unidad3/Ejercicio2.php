<?php
/*
Crea el código que dé respuesta al siguiente planteamiento:
Queremos almacenar en una matriz el número de alumnos con el que cuenta una
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.
*/

$alumnos=array(
    'basico'=> array('Inglés'=>1,'Francés'=>14,'Alemán'=>8,'Ruso'=>3),
    'medio'=> array(
        'Inglés'=>6,
        'Francés'=>19,
        'Alemán'=>7,
        'Ruso'=>2
    ),
    'perfeccionamiento'=> array(
        'Inglés'=>3,
        'Francés'=>13,
        'Alemán'=>4,
        'Ruso'=>1
    )

);
foreach ($alumnos as $nombre => $primerfor) {
    foreach ($primerfor as $idioma => $numero) {
        echo /*$idioma." ".*/$numero."     ";
    }
    echo "</br>";
}

?>