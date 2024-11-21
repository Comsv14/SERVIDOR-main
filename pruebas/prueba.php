<?php

$val =10;
$sum=0;
    for ($i=0; $i <5; $i++) { 
       $M[$i]=$val;
       $sum+=$M[$i];
       $val+=10;
       
    }
    
    echo "La media de los valores es: " .($sum/5). "<br>";
    var_dump($M);
?>