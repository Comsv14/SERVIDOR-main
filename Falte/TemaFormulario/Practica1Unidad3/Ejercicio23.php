<?php
/*Crea  un  array  multidimensional  para  poder  guardar  los  componentes  de  dos 
familias: “Los Simpson” y “Los Griffin” dentro de cada familia  ha  de  constar  el 
padre,  la  madres  y  los  hijos,  donde  padre,  madre  e  hijos  serán  los  índices  y  los 
índices y los nombres serán los valores. Esta estructura se ha de crear en un solo 
array asociativo de tres dimensiones. 

Muestra los valores de las dos familias en una lista no numerada.
*/
$familias = [
    "Los Simpson" => [
        "padre" => "Homer Simpson",
        "madre" => "Marge Simpson",
        "hijos" => [
            "Bart Simpson",
            "Lisa Simpson",
            "Maggie Simpson"
        ]
    ],
    "Los Griffin" => [
        "padre" => "Peter Griffin",
        "madre" => "Lois Griffin",
        "hijos" => [
            "Meg Griffin",
            "Chris Griffin",
            "Stewie Griffin"
        ]
    ]
];

echo "<ul>";
foreach ($familias as $familia => $miembros) {
    echo "<li><strong>$familia</strong>";
    echo "<ul>";
    echo "<li><strong>Padre:</strong> ", $miembros["padre"], "</li>";
    echo "<li><strong>Madre:</strong> ", $miembros["madre"], "</li>";
    echo "<li><strong>Hijos:</strong>";
    echo "<ul>";
    foreach ($miembros["hijos"] as $hijo) {
        echo "<li>$hijo</li>";
    }
    echo "</ul></li>"; 
    echo "</ul></li>"; 
}
echo "</ul>";
?>