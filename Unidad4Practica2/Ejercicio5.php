<?php
$email="abc@abc.com";
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "FoRmato de Email invalido";
 }
 }
echo $email;
echo "<br>";
echo $emailErr;
echo "<br>";

echo 'La funcion filter_var sirve para validar un correo, si es distinto y lo valida y salta el $emailErr que se cambia y pone que el email es invalido';
?>
