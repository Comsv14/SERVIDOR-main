<?php
    /*
        Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu
        mismo los valores, poniendo índices alfanuméricos a cada valor con tres
        elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y
        muéstralo por pantalla en una tabla.
    */

    $lenguajes_cliente[0] = "JavaScript";
    $lenguajes_cliente[1] = "HTML";
    $lenguajes_cliente[2] = "CSS";
    $lenguajes_servidor[3] = "PHP";
    $lenguajes_servidor[4] = "Python";
    $lenguajes_servidor[5] = "C#";

    $lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);
    $n = 0;

    echo "<table>";
    echo "<tr>";
    echo "<th>Cliente</th>";
    foreach ($lenguajes as $valor) {

        if ($n == 3) {
            echo "</tr>";
            echo "<tr>";
            echo "<th>Servidor</th>";
        }
        echo "<td>$valor</td>";

        $n++;
    }
    echo "<tr>";
    echo "</table>";
?>