<?php
/*
Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y
por último elimina el array.
*/
$array = array(
    5 => 1,
    12 => 2,
    13 => 56,
    'x' => 42
);

// Mostrar el contenido del array
echo "<h3>Contenido del array:</h3>";
foreach ($array as $key => $value) {
    echo "Clave: $key, Valor: $value<br>";
}

// Contar el número de elementos en el array
$numero_elementos = count($array);
echo "<h3>Número de elementos en el array: $numero_elementos</h3>";

// Borrar el contenido de la posición 5
unset($array[5]);

// Mostrar el contenido después de eliminar la posición 5
echo "<h3>Contenido del array después de eliminar la clave 5:</h3>";
foreach ($array as $key => $value) {
    echo "Clave: $key, Valor: $value<br>";
}

// Eliminar el array
unset($array);

// Verificar si el array ha sido eliminado
if (!isset($array)) {
    echo "<h3>El array ha sido eliminado.</h3>";
}
?>
