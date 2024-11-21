<?php
/*
    Escribe una función que reciba una cadena y comprueba si es un palíndromo.
    strrev
*/
function esPalindromo($cadena) {
    // Eliminar espacios en blanco y convertir a minúsculas
    $cadena = strtolower(str_replace(' ', '', $cadena));
    
    // Invertir la cadena
    $cadenaInvertida = strrev($cadena);
    
    // Comparar la cadena original con la invertida
    return $cadena === $cadenaInvertida;
}
$texto = "A man a plan a canal Panama";
//$texto ="Treadeawd";
if (esPalindromo($texto)) {
    echo "$texto ,es un palíndromo.";
} else {
    echo "$texto ,no es un palíndromo.";
}
?>