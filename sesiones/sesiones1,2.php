<?php
session_start();
$usu='manolin';
$contra='1';
if (isset($_POST['submit'])) {
    if ($_POST['usuario'] === $usu && $_POST['contrasenia'] === $contra) {
        echo 'Te has loggeado correctamente';
        exit; 
    } else {
        echo 'Usuario o contraseña incorrectos';
        exit;
    }
}
?>