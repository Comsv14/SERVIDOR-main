<?php
    /*
        Crea un array multidimensional para poder guardar los componentes de dos
        familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el
        padre, la madres y los hijos, donde padre, madre e hijos serán los índices y los
        índices y los nombres serán los valores. Esta estructura se ha de crear en un solo
        array asociativo de tres dimensiones.
            Familia “Los Simpson”: padre Homer, madre Marge, hijos Bart, Lisa y Maggie.
            Familia “Los Griffin”: padre Peter, madre Lois, hijos Chris, Meg y Stewie.
        Muestra los valores de las dos familias en una lista no numerada
    */

    $Familia = array(
        "Los Simpson" => array(
            "Padre" => "Homer",
            "Madre" => "Marge",
            "Hijos" => array ("Bart", "Lisa", "Maggie")
        ),
        "Los Griffin" => array(
            "Padre" => "Peter",
            "Madre" => "Lois",
            "Hijos" => array ("Chris", "Meg", "Stewie")
        )
    );

    echo "<ul>";
    foreach ($Familia as $familia => $rol) {
        echo "<li>";
        echo $familia;
        echo "<ul>";
        
        foreach ($rol as $clave => $nombre) {
            echo "<li>".$clave."";
            echo "<ul>";
            
            if (!is_array($nombre)) {
                echo "<li>".$nombre."</li>";
            } else {
                foreach ($nombre as $valor) {
                    echo "<li>".$valor."</li>";
                }
                
            }
            
            echo "</ul></li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";
?>