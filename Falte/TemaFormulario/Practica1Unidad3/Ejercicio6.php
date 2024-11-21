<?php
$matriz = array();
$mayor = 0;
for($i = 0; $i<4; $i++){
    for($j = 0; $j<5; $j++){
        $aletuno = rand(1,9);
        if($aletuno > $mayor){
            $mayor = $aletuno;
            $fila = $i+1;
            $colum = $j+1;
        } 
        $matriz[$i][$j]= $aletuno;
    }
}
for($i = 0; $i<3; $i++){
    for($j = 0; $j<5; $j++){
        echo "(".$matriz[$i][$j].")";
    }
echo"<br>";
}
echo "<br>El número mayor es $mayor, en la fila $fila y columna $colum";
?>