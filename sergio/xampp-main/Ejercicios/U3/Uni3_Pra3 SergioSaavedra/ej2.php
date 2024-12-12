<?php
    /*
        Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que
        la incluya y la utilice.
    */

    include "matematicas.php";

    $resultado = segundoGrado(1,-5,6);

    if (!$resultado) {
        echo "La ecuacion no tiene soluciones reales";
    } else {
        echo "x1 = ".$resultado[0]."<br> x2 = ".$resultado[1];
    }
?>