<?php
/* Crea el código que dé respuesta al siguiente planteamiento:
Queremos almacenar en una matriz el número de alumnos con el que cuenta una
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.
*/

$alumnos = array(
    "Basico"=> array(
        'Ingles'=> 1,
        'Frances'=> 14,
        'Aleman'=> 8,
        'Ruso'=> 3
    ),
    "Medio"=> array(
        'Ingles'=> 6,
        'Frances'=> 19,
        'Aleman'=> 7,
        'Ruso'=> 2
    ),
    "Perdeccionamiento"=> array(
        'Ingles'=> 3,
        'Frances'=> 13,
        'Aleman'=> 4,
        'Ruso'=> 1
    ),
);

foreach ($alumnos as $nombres => $primerfor) {
    foreach ($primerfor as $idioma=> $valor) {

        echo $idioma . " = " .$valor;

    }
    echo "<br>";
}



?>