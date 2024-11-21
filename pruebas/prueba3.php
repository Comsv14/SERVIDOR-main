<?php
$matriz = array(
    array(1, 2, 3, 1),
    array(5, 1, 1 ,8),
    array(9, 1, 1, 12),
    array(1, 14, 15, 1)
);
$sumprincipal=0;
$sumsecundaria=0;
for ($i = 0; $i < 4; $i++) {    
    $sumprincipal+=$matriz[$i][$i];
    $sumsecundaria+=$matriz[$i][count($matriz)-1-$i];
}

echo "La suma de la diagonal principal es: " . $sumprincipal . "<br>";
echo "La suma de la diagonal secundaria es: " . $sumsecundaria . "<br>";
var_dump($matriz); 

?>