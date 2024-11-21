<?php
function suma_elementos($matriz) {
    foreach ($matriz as $fila => $columna) {
        foreach ($columna as $key => $numero) {
            echo "($numero)";
        }
        echo "<br>";
    }
    $tamano = count($matriz);
    //diagonal principal
    for ($i = 0; $i < $tamano; $i++) {
        $principal[$i] = $matriz[$i][$i];
    }
    //diagonal secundaria
    for ($i = 0; $i < $tamano; $i++) {
        $secundaria[$i] = $matriz[$i][$tamano - $i - 1];
    }
    $sumaPrincipal=array_sum($principal);
    $sumaSecunadaria=array_sum($secundaria);
    echo"Suma de la diagonal principal: ".$sumaPrincipal."</br>";
    echo"Suma de la diagonal secundaria: ".$sumaSecunadaria;
}
if (isset($_POST['valores'])) {
    $matriz = $_POST['valores'];
    suma_elementos($matriz);
} else {
    echo "No se recibieron datos. GG.";
}
?>
