<?php
include 'Ejercicio1.php';
/*
    Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que 
    la incluya y la utilice.
*/
//false
$ecu=ecuacion(1,4,5);
//un resultado
//$ecu=ecuacion(1,2,1);
//dos resultados
//$ecu=ecuacion(1,2,-3);

if($ecu === false) {
    echo "La ecuacion no tiene soluciones reales";
}else{
    echo "Resultados: ",implode($ecu);
}
?>