<?php
// Escribe una función que reciba una cadena y comprueba si es un palíndromo.
function palindromo($cadena) {
    $lon = strlen($cadena);
    for ($i=0; $i<$lon; $i++) {
        $txt[$i] = substr($cadena, $i, 1);
    }

    $invertido = array_reverse($txt);

    if ($txt == $invertido) {
        return true;
    } else {
        return false;
    }
}


if (palindromo("ana")) {
    echo "Es un palindromo";
} else {
    echo "NO es un palindromo";
}


?>