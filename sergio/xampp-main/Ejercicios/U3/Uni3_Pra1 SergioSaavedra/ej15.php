<?php
    /*
        Crea un array con los nombre Pedro, Ismael, Sonia, Clara, Susana, Alfonso y
        Teresa. Muestra el número de elementos que contiene y cada elemento en una
        lista no numerada de html.
    */

    $M = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

    echo "El array tiene ".count($M)." elementos";
    echo "<br>";
    echo "<ul>";
    foreach ($M as $valor) {
        echo "<li>".$valor."</li>";
    }
    echo "</ul>";
?>