<?php
/* Crea un array llamado deportes e introduce los siguientes valores: futbol,
baloncesto, natación, tenis. Haz el recorrido de la matriz con un for para mostrar
sus valores. A continuación realiza las siguientes operaciones
 Muestra el total de valores que contiene.
 Sitúa el puntero en el primer elemento del array y muestra el valor actual, es
decir, donde está situado el puntero actualmente.
 Avanza una posición y muestra el valor actual.
 Coloca el puntero en la última posición y muestra su valor.
 Retrocede una posición y muestra este valor.
*/
// Crear el array deportes
$deportes = ["futbol", "baloncesto", "natacion", "tenis"];

// Recorrer el array con un bucle for y mostrar sus valores
echo "<strong>Recorrido del array deportes:</strong><br>";
for ($i = 0; $i < count($deportes); $i++) {
    echo $deportes[$i] . "<br>";
}

// Muestra el total de valores que contiene el array
echo "<br><strong>Total de valores:</strong> " . count($deportes) . "<br>";

// Sitúa el puntero en el primer elemento del array y muestra el valor actual
reset($deportes); // Coloca el puntero al inicio
echo "<br><strong>Primer valor (puntero al inicio):</strong> " . current($deportes) . "<br>";

// Avanza una posición y muestra el valor actual
next($deportes); // Avanza una posición
echo "<strong>Segundo valor (puntero avanzado):</strong> " . current($deportes) . "<br>";

// Coloca el puntero en la última posición y muestra su valor
end($deportes); // Coloca el puntero al final
echo "<strong>Último valor (puntero al final):</strong> " . current($deportes) . "<br>";

// Retrocede una posición y muestra este valor
prev($deportes); // Retrocede una posición
echo "<strong>Penúltimo valor (puntero retrocedido):</strong> " . current($deportes) . "<br>";
?>
