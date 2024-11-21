<?php
session_start();
if (isset($_POST['entrar'])) {
    
    if (isset($_SESSION['usuario'], $_SESSION['contrasenia'])) {
        if ($_POST['usuario'] === $_SESSION['usuario'] && $_POST['contrasenia'] === $_SESSION['contrasenia']) {
            echo "Usuario: ". $_SESSION['usuario'] ."</br>"."Plan: " . $_SESSION['plan'];
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "No hay datos registrados. Por favor, <a href='sesionesacceso.php'>regístrate aquí</a>.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesion</title>
</head>
<body>
    <h1>Iniciar Sesion</h1>
    <form action="sesiones1full.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required>
        <br>
        <a href="sesionesacceso.php">REGISTRARME</a>
        <br>
        <button type="submit" name="entrar">Entrar</button>
        
    </form>
</body>
</html>

