<?php
// Declaración de variables para pruebas
$var1 = "Hola, Mundo!";
$var2 = "";
$var3 = null;
$array = ["a" => 1, "c" => 3, "b" => 2];

// isset() 
echo "isset() Test:\n";
if (isset($var1)) {
    echo "var1 está definida\n";
} else {
    echo "var1 no está definida\n";
}

if (isset($var3)) {
    echo "var3 está definida\n";
} else {
    echo "var3 no está definida\n";
}
echo "<br>";

// is_null() 
echo "\nis_null() Test:\n";
if (is_null($var1)) {
    echo "var1 es null\n";
} else {
    echo "var1 no es null\n";
}

if (is_null($var3)) {
    echo "var3 es null\n";
} else {
    echo "var3 no es null\n";
}
echo "<br>";

// empty() 
echo "\nempty() Test:\n";
if (empty($var2)) {
    echo "var2 está vacía\n";
} else {
    echo "var2 no está vacía\n";
}

if (empty($var3)) {
    echo "var3 está vacía\n";
} else {
    echo "var3 no está vacía\n";
}
echo "<br>";

// strlen() 
echo "\nstrlen() Test:\n";
echo "Longitud de var1: " . strlen($var1) . "\n";
echo "<br>";

// explode() 
echo "\nexplode() Test:\n";
$cadena = "manzana,platano,cereza";
$array_frutas = explode(",", $cadena);
print_r($array_frutas);
echo "<br>";

// implode()
echo "\nimplode() Test:\n";
$cadena_unida = implode(" - ", $array_frutas);
echo "Cadena unida: $cadena_unida\n";
echo "<br>";

// array_values() 
echo "\narray_values() Test:\n";
print_r(array_values($array));
echo "<br>";

// ksort() 
echo "\nksort() Test:\n";
ksort($array);
print_r($array);
echo "<br>";

// array_keys() 
echo "\narray_keys() Test:\n";
print_r(array_keys($array));

?>
