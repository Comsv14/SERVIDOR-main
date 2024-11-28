<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        html{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
session_start();
if (isset($_POST['submit'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia']) && !empty($_POST['contraseniaC'])) {
        if ($_POST['contrasenia'] === $_POST['contraseniaC']) {
            
            //guardar variables en sesion
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasenia'] = $_POST['contrasenia'];
            $_SESSION['rol'] = $_POST['rol'];

            //meter las variables de sesion en variables solo para este codigo
            $u = $_SESSION['usuario'];
            $c = $_SESSION['contrasenia'];
            $r = $_SESSION['rol'];

            //conexion con la base de datos
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die("Fatal Error");

            //verificar si el usuario ya existe
            $query = "SELECT COUNT(*) FROM `usuarios` WHERE `usu` = '$u'";
            $result = $conn->query($query);
            $row = $result->fetch_row();
            if ($row[0] > 0) {
                echo "<p class='err'>El usuario ya existe.</p>";
            } else {
                //insertar nuevo usuario
                $query = "INSERT INTO `usuarios` (`usu`, `contra`, `rol`) VALUES ('$u', '$c', '$r')";
                $result = $conn->query($query);
                if (!$result) {
                    die("Fatal Error");
                } else {
                    echo "<p>Registro con éxito.</p>";
                }
            }

            $conn->close();
            echo "<p><a href='loginusu.html'>iniciar sesión</a></p>";
            exit;
        } else {
            echo "<p class='err'>Las contraseñas no coinciden.</p>";
        }
    }
}
?>
    <div>
    <h1>Registro</h1>
    <form action="registrousu.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br></br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required>
        <br></br>
        <label>Confirmar contraseña:</label>
        <input type="password" name="contraseniaC" required>
        <br></br>
        <label>Rol:</label>
        <input type="text" name="rol" required>
        <br></br>
        <button type="submit" class="btn pulse-effect" name="submit">Registrar</button>
        <br></br>
        <a href="loginusu.html">Volver</a>
    </form>
    </div>
</body>
</html>
