<?php
/*
    Queremos almacenar en una matriz el número de alumnos con el que cuenta una
    academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
    3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
    columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
    = Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.
*/

$M = array(
    array(1,14,8,3),
    array(6,19,7,2),
    array(3,13,4,1)
);

$ingles = 0;
$frances = 0;
$aleman = 0;
$ruso = 0;
$basico = 0;
$medio = 0;
$perfeccionamiento = 0;

for ($x = 0; $x<3; $x++) {
    
    $ingles = $ingles+$M[$x][0];
    $frances= $frances+$M[$x][1];
    $aleman = $aleman+$M[$x][2];
    $ruso = $ruso+$M[$x][3];
}

for ($y = 0; $y<4; $y++) {
    $basico = $basico+$M[0][$y];
    $medio = $medio+$M[1][$y];
    $perfeccionamiento = $perfeccionamiento+$M[2][$y];
}

echo "Numero de alumnos en Ingles: $ingles <br>";
echo "Numero de alumnos en Francés: $frances <br>";
echo "Numero de alumnos en Alemán: $aleman <br>";
echo "Numero de alumnos en Ruso: $ruso <br>";
echo "Numero de alumnos en Nivel básico: $basico <br>";
echo "Numero de alumnos en Nivel medio: $medio <br>";
echo "Numero de alumnos en Nivel perfeccionamiento: $perfeccionamiento <br>";
?>