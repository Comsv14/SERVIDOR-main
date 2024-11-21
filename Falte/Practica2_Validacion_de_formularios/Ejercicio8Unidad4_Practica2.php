<?php
/*
    Evalúa el siguiente código PHP e indica que hace, ¿para qué sirve la función 
    preg_match?, ¿qué parámetros necesita y qué retorna? 
    if (empty($_POST["name"])) {     
        $nameErr = "El nombre es obligatorio";
    } else {     
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {       
            $nameErr = "Únicamente se permiten letras y espacios";
        }
    }
*/

?>

<?php
    function test_input($data) {
        if (empty($_POST["name"])) {     
            $nameErr = "El nombre es obligatorio";
        } /*Valida que no este vacio*/else {     
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {       
                $nameErr = "Únicamente se permiten letras y espacios";
            }
        }/*Si el campo "name" no está vacío, se procede a limpiar el valor con la función 
        test_input() y luego se asigna el resultado a la variable $name. A continuación, se utiliza 
        preg_match() para verificar si el valor ingresado cumple con un formato específico */
    }

/*
    Evalúa el siguiente código PHP e indica que hace, ¿para qué sirve la función 
    preg_match?, ¿qué parámetros necesita y qué retorna?

    -QUE PARAMETROS NECESITA
    -preg_match() realiza una búsqueda de patrones (expresiones regulares) en una cadena.
    Verifica si una cadena de texto cumple con el formato especificado.

    -PARAMETROS
    -$pattern: la expresión regular a buscar en la cadena. En este caso, el patrón "/^[a-zA-Z ]*$/" permite solo letras mayúsculas y minúsculas (a-z y A-Z), así como espacios ( ).
    -$subject: la cadena de texto en la que se realizará la búsqueda del patrón. Aquí, es el valor de la variable $name.
    
    -RETORNO
    Retorna 1 si el patrón es encontrado en la cadena, es decir, si la cadena cumple con el patrón.
    Retorna 0 si no hay coincidencias con el patrón.
    Retorna false si ocurre un error. 
*/
?>