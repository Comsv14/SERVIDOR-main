<?php
/*
    Desarrollar una función en PHP que reciba  un EMAIL y valide si este es correcto,
    la función se llamará funcion_validar_email.php
*/
function validar_email($email) {
    // Usar filtro para validar el formato del email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;  // Email válido
    } else {
        return false; // Email no válido
    }
}

// Ejemplo de uso
$email = "ejemplo@dominio.com";
if (validar_email($email)) {
    echo "El correo electrónico '$email' es válido.";
} else {
    echo "El correo electrónico '$email' no es válido.";
}
?>