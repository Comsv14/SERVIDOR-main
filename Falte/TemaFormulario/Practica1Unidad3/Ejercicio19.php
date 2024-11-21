<?php
    include 'Ejercicio18.php';
    /*Muestra el array del ejercicio anterior pero en orden inverso.*/
    echo "------------</br>";
    echo "Ejercicio 19</br>";
    echo "------------</br>";
    $filas = count($todos);
    for ($i=$filas-1; $i >= 0; $i--) { 
        echo"Elemento numero ".$i." ".$todos[$i]."</br>";
    }

?>