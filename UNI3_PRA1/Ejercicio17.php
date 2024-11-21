<?php

$array1 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
$array2 = array("12", "34", "45", "52", "12");
$array3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");


$array_combinado = array_merge($array1, $array2, $array3);


foreach ($array_combinado as $valor) {
    echo "$valor<br>";
}
?>
