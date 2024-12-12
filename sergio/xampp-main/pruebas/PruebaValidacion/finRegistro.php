<?php
session_start();
if ($_POST["psw"] == $_POST["reppsw"]) {
    $_SESSION["usu"] = $_POST['usu'];
    $_SESSION["psw"] = $_POST["psw"];
    $_SESSION["rol"] = $_POST["rol"];
    echo "Usuario registrado correctamente <br>";
    echo "<a href='acceso.php'>Inicia sesión</a>";
} else {
    echo "Las contraseñas no coinciden<br>";
    echo "<a href='registro.php'>Intentelo de nuevo</a>";
}
?>