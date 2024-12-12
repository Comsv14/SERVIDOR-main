<?php
    /*
        Implementa un array asociativo con los siguientes valores y ordénalo de menor a
        mayor. Muestra los valores en una tabla.
            $numeros=array(3,2,8,123,5,1)
    */

    $numeros=array(3,2,8,123,5,1);

    sort($numeros);

    

    echo "<table>";

    foreach ($numeros as $clave => $valor) {
        echo "<tr>";
        echo "<th>".$clave."</th>";
        echo "<td>".$valor."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>