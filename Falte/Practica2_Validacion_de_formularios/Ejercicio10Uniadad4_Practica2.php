<?php
/*
    Desarrollar una función en PHP que reciba  una URL y validar si este es correcto,
    la función se llamará funcion_validar_url.php
*/

function validar_url($url) {
    // Usar filtro para validar el formato de la url
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;  // URL válido
    } else {
        return false; // URL incorrecta
    }
    }
// Ejemplo de uso
$url = 'https://www.google.com';
if (validar_url($url)) {
    echo 'La URL es correcta';
} else {
    echo 'La URL es incorrecta';
}
?>