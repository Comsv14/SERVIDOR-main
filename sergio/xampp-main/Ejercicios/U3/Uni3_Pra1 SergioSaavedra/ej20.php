<?php
    /*
        Implementa un array asociativo con los siguientes valores:
            $estadios_futbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");

        Muestra los valores del array en una tabla, has de mostrar el índice y el valor asociado.
        Elimina el estadio asociado al Real Madrid.
        Vuelve a mostrar los valores para comprobar que el valor ha sido eliminado, esta vez en una lista numerada.
    */
    $estadios_futbol = array(
        "Barcelona" => "Camp Nou", 
        "Real Madrid" => "Santiago Bernabeu", 
        "Valencia" => "Mestalla", 
        "Real Sociedad" => "Anoeta");

    echo "<table>";
    
    foreach ($estadios_futbol as $clave => $valor) {
        echo "<tr>";
        echo "<th>".$clave."</th>";
        echo "<td>".$valor."</td>";
        echo "</tr>";
    }
    
    echo "</table> <br>";

    echo "************* <br>";

    echo "<ul>";

    foreach ($estadios_futbol as $clave => $valor) {
        if ($clave == "Real Madrid") {
            unset($valor);
        } else {
            echo "<li>".$valor."</li>";
        }

        
        
        
    }

    echo "</ul> <br>";


?>