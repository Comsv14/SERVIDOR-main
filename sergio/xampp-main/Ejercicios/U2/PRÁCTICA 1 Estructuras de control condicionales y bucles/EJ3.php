<?php
    /*
        Determinar la cantidad de dinero que recibirá un trabajador por concepto de las
        horas extras trabajadas en una empresa, sabiendo que cuando las horas de
        trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al
        doble de una hora normal cuando no exceden de 8; si las horas extras exceden de
        8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto
        al triple.
    */
    $horas = 49;
    $sueldoh = 8;
    $resulDobles = 0;
    $resulTriples = 0;

    if ($horas < 40) {
        $resulNormales = $horas * $sueldoh;
    } elseif ($horas > 40 && $horas < 48) {
        $resulNormales = $sueldoh * 40;
        $extras = $horas - 40;
        $resulDobles = $extras * ($sueldoh*2);
    } else {
        $resulNormales = $sueldoh * 40;
        $resulDobles = ($sueldoh*2) * 8;
        $extras = $horas - 48;
        $resulTriples = $extras * ($sueldoh*3);
    }

    echo "Pago horas normales: $resulNormales";
    echo "<br>";
    echo "Pago horas dobles: $resulDobles";
    echo "<br>";
    echo "Pago horas triples: $resulTriples";
    echo "<br>";
    $resul = $resulNormales + $resulDobles + $resulTriples;
    echo "Total: $resul";
?>