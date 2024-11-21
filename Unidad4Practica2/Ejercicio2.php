<?php
    $valor = " Es tu nombre O\'reilly? ";
    echo $valor. '<br>';
    $valor =test_entrada($valor);
    echo $valor. '<br>';
     
     function test_entrada($valor) {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        return $valor;
       }
?>