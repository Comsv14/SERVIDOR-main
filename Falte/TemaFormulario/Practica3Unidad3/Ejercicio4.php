<?php
/*
    Escribe  una  función  que reciba  un  array  de números,  y  un número,  el  límite.  La 
    función  tiene  que  devolver  un  nuevo  array  que  contenga  solo  los  elementos  del 
    array original menores que el límite.
*/
$limite=7;
$array=array(1,2,3,4,5,6,7,8,9,10);
function arrayMenores($array, $limite){
for ($i=0; $i < count($array); $i++) { 
  if($array[$i]<$limite){
    echo $array[$i], "<br>";
  }
}
}
arrayMenores($array, $limite);
?>