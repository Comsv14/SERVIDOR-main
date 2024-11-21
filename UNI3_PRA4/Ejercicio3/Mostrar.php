<?php
include 'Vehiculo.php';
$vehiculo1 = new Vehiculo('Negro', 1500);
echo $vehiculo1->_toString().'<br>';
echo $vehiculo1->circula().'<br>';
echo $vehiculo1->aniadirPersona(70);
echo $vehiculo1->_toString().'<br>';
?>