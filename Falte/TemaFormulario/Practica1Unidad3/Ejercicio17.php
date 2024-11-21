<?php
/*
    Rellena los siguientes tres arrays y júntalos en uno nuevo. Muéstralos por 
    pantalla. Utiliza la función array_merge() 
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
$todos = array_merge($animales,$numeros,$arboles);
$filas=count($todos);
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