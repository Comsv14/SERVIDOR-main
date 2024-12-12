<?php
/*
    Escribe una función que reciba un array de números, y un número, el límite. La
    función tiene que devolver un nuevo array que contenga solo los elementos del
    array original menores que el límite.
*/

function numeros($arrayNumeros, $limite) {
    for ($i=0; $i<count($arrayNumeros); $i++) {
        if ($arrayNumeros[$i] < $limite) {
            $array[$i] = $arrayNumeros[$i];
        }

    }

    return $array;
}

$arrayOG = array(5,9,2);
$limit = 6;

$arrayNV = numeros($arrayOG, $limit);
/*
    echo var_dump($arrayOG)."<br>";
    echo var_dump($arrayNV)."<br>";
*/

foreach ($arrayOG as $num) {
    echo $num.", ";
}
echo "<br>";
foreach ($arrayNV as $valor) {
    echo $valor.", ";
}

?>