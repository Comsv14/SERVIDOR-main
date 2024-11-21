<?php
/*
Realiza el ejercicio anterior pero con la funicón array_push().
*/
$animales=array(
    'Lagartija',
    'Araña',
    'Perro',
    'Gato',
    'Ratón'
);
$numeros=array(
    12,
    34,
    45,
    52,
    12
);
$arboles=array(
    "Sauce",
    "Pino",
    "Naranjo",
    "Chopo",
    "Perro",
    34
);
$todos=array();
array_push($todos, ...$animales);
array_push($todos, ...$numeros);
array_push($todos, ...$arboles);
echo "------------</br>";
echo "Ejercicio 18</br>";
echo "------------</br>";
$filas = count($todos);
for ($i=0; $i < $filas; $i++) { 
    echo"Elemneto numero ".$i." ".$todos[$i]."</br>";
}
/*
echo "<table border='1' style='border-collapse: collapse;'>";
    echo "  <tr>
                <th>Abreviatura</th>
                <th>Lenguaje</th>
            </tr>";

    foreach($lenguajes as $abreviatura => $lenguaje) {
        echo "<tr><td>{$abreviatura}</td><td>{$lenguaje}</td></tr>";
    }
echo "</table>";
*/
?>