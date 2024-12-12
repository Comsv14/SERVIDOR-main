<?php
$m = array(array(1,2,3,1)
,          array(5,1,1,8)
,          array(6,1,1,9)
,          array(10,11,12,1));
$dPrincipal = 0;
$dSecundaria = 0;



for ($b = 3; $b>=0; $b--) {
    $dPrincipal = $dPrincipal+ $m[$b][$b];
    $dSecundaria = $dSecundaria + $m[$b][3-$b];
   
}
echo "Principal: $dPrincipal <br>";
echo "Secundaria: $dSecundaria";




?>