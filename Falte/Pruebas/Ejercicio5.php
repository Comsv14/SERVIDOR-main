<?php
/*
    Escribe un script para probar algunas de las funciones mostradas debajo, el sript 
    ha de contener al menos tres funciones de cada bloque
*/
// Bloque 1: isset(), is_null(), empty()

// Variables de prueba
$var1 = 10;
$var2 = null;
$var3 = "";
$var4 = false;

// Pruebas
echo "isset(var1): " . var_dump(isset($var1)) . "<br>";
echo "is_null(var2): " . var_dump(is_null($var2)) . "<br>";
echo "empty(var3): " . var_dump(empty($var3)) . "<br>";
echo "empty(var4): " . var_dump(empty($var4)) . "<br>";

// Bloque 2: is_int(), is_float(), is_bool(), is_array()

// Más variables de prueba
$var5 = 3.14;
$var6 = true;
$var7 = ["manzana", "banana", "cereza"];

// Pruebas
echo "is_int(var1): " . var_dump(is_int($var1)) . "<br>";
echo "is_float(var5): " . var_dump(is_float($var5)) . "<br>";
echo "is_bool(var6): " . var_dump(is_bool($var6)) . "<br>";
echo "is_array(var7): " . var_dump(is_array($var7)) . "<br>";

// Bloque 3: intval(), floatval(), boolval(), strval()

// Pruebas
echo "intval(var5): " . intval($var5) . "<br>";
echo "floatval(var1): " . floatval($var1) . "<br>";
echo "boolval(var3): " . boolval($var3) . "<br>";
echo "strval(var6): " . strval($var6) . "<br>";

?>