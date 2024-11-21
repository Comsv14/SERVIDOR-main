<?php
/*
    Dada la siguiente línea de código $valor = "    Es tu nombre O\'reilly?     "; 
    - Evalúa que resultado produce la siguiente línea de código e indica qué valor tiene 
    la variable $resultado. 
    $resultado = trim($valor); 
    - Evalúa que resultado produce la siguiente línea de código e indica qué valor tiene 
    la variable $resultado. 
    $resultado = stripslashes($valor);
*/
$valor = "    Es tu nombre O\'reilly?     ";
$resultado = trim($valor);
echo $resultado;
echo "<br>";
$resultado = stripslashes($valor);
echo $resultado;
/*
    Es tu nombre O\'reilly?
    Es tu nombre O'reilly?

    El segundo tendria que tener espacios tambien

    La función trim() elimina los espacios en blanco al principio y al final de una cadena. 
    No modifica el contenido de la cadena en su interior. 
    En este caso, elimina los espacios al inicio y al final de $valor.

    La función stripslashes() elimina las barras invertidas (\) que aparecen justo antes de comillas (' o "). 
    Esto se usa comúnmente para limpiar datos que vienen con caracteres de escape. 
    En este caso, eliminará el carácter de escape (\) antes del apóstrofe.


    Después de trim($valor): "Es tu nombre O\'reilly?" (sin espacios al inicio y al final).
    Después de stripslashes($valor): " Es tu nombre O'reilly? " 
    (sin la barra invertida antes del apóstrofe, pero con espacios).
*/
?>