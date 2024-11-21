<?php
/*
Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu
mismo los valores, poniendo índices alfanuméricos a cada valor con tres
elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y
muéstralo por pantalla en una tabla.
*/
$lenguajes_cliente = array(
    "JC1" => "JavaScript",
    "PY1" => "Python",
    "RW1" => "Ruby"
);

$lenguajes_servidor = array(
    "PHP1" => "PHP",
    "NODE" => "Node.js",
    "JAVA" => "Java"
);

$lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);

echo "<table border='1'>";
echo "<tr><th>Índice</th><th>Lenguaje</th></tr>";

foreach ($lenguajes as $indice => $lenguaje) {
    echo "<tr><td>$indice</td><td>$lenguaje</td></tr>";
}

echo "</table>";
?>
