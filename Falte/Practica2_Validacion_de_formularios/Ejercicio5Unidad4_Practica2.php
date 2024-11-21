<?php
/*
    Evalúa el siguiente código PHP e indica que hace, ¿para qué sirve la función 
    filter_var?,
    ¿qué parámetros necesita y qué retorna?
    <?php 
    $email="abc@abc.com";
    $emailErr="Email correcto";
        if (empty($email)) {
            $emailErr = "Se requiere Email";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Fomato de Email invalido";
        }   
    } 
    echo $email;
    echo "<br>";
    echo $emailErr; 
    ?>

    
    -filter_var — Filtra una variable con el filtro que se indique
    Retorna los datos filtrados o false si el filtro falla.
    Parametros necesarios filter_var(variable, filtro que valida(email,url...))
    
*/
?>