<?php
/*
    Declara un array de strings de nombre $jugador e introduce en él 5 elementos
    que sean "Crovic", "Antic", "Malic", "Zulic" y "Rostrich". A continuación usando el
    operador de concatenación haz que se muestre la frase: <<La alineación del
    equipo está compuesta por Crovic, Antic, Malic, Zulic y Rostrich.>>
*/

$jugador = array("Crovic", "Antic", "Malic", "Zulic", "Rostrich");

echo "La alineación del equipo está compuesta por $jugador[0]";

for ($i = 1; $i < count($jugador); $i++) {
    if ($i+1 == count($jugador)) {
        echo " y ".$jugador[$i].".";
    } else {
        echo ", ".$jugador[$i];
    }
}
?>