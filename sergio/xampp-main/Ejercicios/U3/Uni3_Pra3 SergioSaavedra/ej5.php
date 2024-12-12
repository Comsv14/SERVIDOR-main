<?php
/*
    Escribe un script para probar algunas de las funciones mostradas debajo, el sript
    ha de contener al menos tres funciones de cada bloque
*/


$correo = "sergiosr96@educastur.es";

if (is_string($correo) && !is_null($correo)) {
    $correo = strtolower($correo);
    $datos = explode("@", $correo);

    if (!array_key_exists(1, $datos) || count($datos)>2) {
        echo ("Correo no valido compruebe los datos <br>");
        print_r(array_values($datos));
    } else {
        echo "Usuario: ".$datos[0]."<br> Proveedor de correo: ".$datos[1];

        if (strcmp("educastur.\*", $datos[1])) {
            echo ("<br>Tiene un correo educativo");
        }
    }


    
} else if (empty($correo)) {
    echo "Rellene los datos";
} else {
    echo "Valor no valido";
}

?>