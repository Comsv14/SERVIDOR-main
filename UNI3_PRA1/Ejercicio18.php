<?php

$array1 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
$array2 = array("12", "34", "45", "52", "12");
$array3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");


$array_combinado = array();


foreach ($array1 as $valor) {
    array_push($array_combinado, $valor);
}

foreach ($array2 as $valor) {
    array_push($array_combinado, $valor);
}

foreach ($array3 as $valor) {
    array_push($array_combinado, $valor);
}


foreach ($array_combinado as $valor) {
    echo "$valor<br>";
}
?>
