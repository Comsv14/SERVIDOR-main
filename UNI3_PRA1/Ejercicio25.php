<?php
/*Crea una matriz para guardar a los amigos clasificados por diferentes ciudades.
Los valores serán los siguientes:
Haz un recorrido del array multidimensional mostrando los valores de tal manera
que nos muestre en cada ciudad que amigos tiene
*/
// Crear la matriz multidimensional con los amigos clasificados por ciudad
$amigosPorCiudad = [
    "Madrid" => [
        "nombre" => "Pedro",
        "edad" => 32,
        "telefono" => "91-999.99.99"
    ],
    "Barcelona" => [
        "nombre" => "Susana",
        "edad" => 34,
        "telefono" => "93-000.00.00"
    ],
    "Toledo" => [
        "nombre" => "Sonia",
        "edad" => 42,
        "telefono" => "925-09.09.09"
    ]
];

// Recorrer el array multidimensional y mostrar los valores
foreach ($amigosPorCiudad as $ciudad => $amigo) {
    echo "<strong>Ciudad: $ciudad</strong><br>";
    echo "Nombre: " . $amigo['nombre'] . "<br>";
    echo "Edad: " . $amigo['edad'] . "<br>";
    echo "Teléfono: " . $amigo['telefono'] . "<br><br>";
}
?>

