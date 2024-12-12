<?php
    /*
        Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
        contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
        continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y
        por último elimina el array
    */
    $M = array(
        5 => 1,
        12 => 2,
        13 => 56,
        'x' => 42
    );

    foreach ($M as $clave => $valor) {
        echo $valor." ";
    }
    echo "<br>";

    echo "Numero de elementos ".count($M)."<br>";
    unset($M[5]);

    foreach ($M as $clave => $valor) {
        echo $valor." ";
    }

    unset($M);

?>