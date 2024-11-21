<?php
/*Implementa un array asociativo con los siguientes valores y ordénalo de menor a
mayor. Muestra los valores en una tabla.
$numeros=array(3,2,8,123,5,1)

*/
$numeros = array(3, 2, 8, 123, 5, 1);


sort($numeros);


echo "<table border='1'>";
echo "<tr><th>Números</th></tr>";

foreach ($numeros as $numero) {
    echo "<tr><td>$numero</td></tr>";
}

echo "</table>";
?>
