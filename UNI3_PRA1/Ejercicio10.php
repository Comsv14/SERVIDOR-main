<?php
/* Carga el siguiente vector e imprime los valores del array asociativo usando la
estructura de control foreach:
$v[1]=90;
$v[30]=7;
$v[‘e’]=99;
$v[‘hola’]=43;*/

// Definir el array asociativo
$v = [
    1 => 90,
    30 => 7,
    'e' => 99,
    'hola' => 43
];

// Usar la estructura foreach para imprimir los valores
foreach ($v as $clave => $valor) {
    echo "Clave: $clave, Valor: $valor<br>";
}
?>


