<?php
require_once 'persona.php';
//Creamos el objeto.
$persona = new Persona('Fernando','Gaitan',26);
//Seteamos las propiedades.
$persona->nombre;
$persona->apellido;
$persona->edad;
//Mostramos el resultado de las propiedades.
echo $persona->saludar();
unset($persona);
?>