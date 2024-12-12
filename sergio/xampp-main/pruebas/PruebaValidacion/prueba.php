<?php
    session_start();
    if (!isset($_SESSION["usu"])) {
        $usu = "pepito";
        $contra = "123";
    } else {
        $usu = $_SESSION["usu"];
        $contra = $_SESSION["psw"];
    }
    

    if ($_POST['usu'] == $usu && $_POST['psw'] == $contra) {
        echo "Correcto";
    } else {
        echo "Usuario y/o Contraseña erronea";
    }
?>