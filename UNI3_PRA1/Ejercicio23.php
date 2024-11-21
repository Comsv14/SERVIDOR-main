<?php
/*Crea un array multidimensional para poder guardar los componentes de dos
familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el
padre, la madres y los hijos, donde padre, madre e hijos serán los índices y los
índices y los nombres serán los valores. Esta estructura se ha de crear en un solo
array asociativo de tres dimensiones.
*/
$familias = [
    "Los Simpson" => [
        "padre" => "Homer",
        "madre" => "Marge",
        "hijos" => ["Bart", "Lisa", "Maggie"]
    ],
    "Los Griffin" => [
        "padre" => "Peter",
        "madre" => "Lois",
        "hijos" => ["Chris", "Meg", "Stewie"]
    ]
];

// Mostrar los valores de las dos familias en una lista no numerada
foreach ($familias as $familia => $miembros) {
    echo "<strong>Familia $familia:</strong><br>";
    echo "Padre: " . $miembros['padre'] . "<br>";
    echo "Madre: " . $miembros['madre'] . "<br>";
    echo "Hijos: " . implode(", ", $miembros['hijos']) . "<br><br>";
}
?>
