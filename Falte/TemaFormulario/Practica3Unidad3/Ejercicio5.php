<?php
// Bloque de Funciones de Variables
$var1 = 5;
$var2 = null;
$var3 = "Hello";

// isset: Verifica si una variable está definida y no es NULL
echo "isset(\$var1): " . (isset($var1) ? "TRUE" : "FALSE") . "</br>";
echo "isset(\$var2): " . (isset($var2) ? "TRUE" : "FALSE") . "</br>";

// is_null: Verifica si una variable es NULL
echo "is_null(\$var2): " . (is_null($var2) ? "TRUE" : "FALSE") . "</br>";

// empty: Verifica si una variable está vacía
echo "empty(\$var3): " . (empty($var3) ? "TRUE" : "FALSE") . "</br>";

// intval: Convierte el valor de la variable a entero
echo "intval(\$var3): " . intval($var3) . "</br>";

// is_int: Comprueba si la variable es de tipo entero
echo "is_int(\$var1): " . (is_int($var1) ? "TRUE" : "FALSE") . "</br>";

// Bloque de Funciones de Cadenas
$cadena1 = "Hola Mundo";
$cadena2 = "Hola";
$cadena3 = "Mundo";
$token = " ";

// strlen: Devuelve la longitud de una cadena
echo "strlen(\$cadena1): " . strlen($cadena1) . "</br>";

// explode: Divide una cadena en un array utilizando un delimitador
$array_exploded = explode($token, $cadena1);
echo "explode(\$cadena1): ";
print_r($array_exploded);

// implode: Junta los elementos de un array en una cadena
$cadena_imploded = implode("-", $array_exploded);
echo "implode(\$array_exploded): " . $cadena_imploded . "</br>";

// strcmp: Compara dos cadenas
echo "strcmp(\$cadena2, \$cadena3): " . strcmp($cadena2, $cadena3) . "</br>";

// Bloque de Funciones de Arrays
$array = array("a" => 5, "b" => 2, "c" => 8, "d" => 1);

// ksort: Ordena el array por clave en orden ascendente
ksort($array);
echo "ksort(\$array): ";
print_r($array);

// array_values: Devuelve los valores del array
$valores = array_values($array);
echo "array_values(\$array): ";
print_r($valores);

// array_keys: Devuelve las claves del array
$claves = array_keys($array);
echo "array_keys(\$array): ";
print_r($claves);

// count: Devuelve el número de elementos del array
echo "count(\$array): " . count($array) . "</br>";

// array_key_exists: Comprueba si una clave existe en el array
echo "array_key_exists('b', \$array): " . (array_key_exists('b', $array) ? "TRUE" : "FALSE") . "</br>";

?>