<?php
session_start();
if (isset($_POST['submit'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia']) && !empty($_POST['contraseniaC'])) {
        if ($_POST['contrasenia'] === $_POST['contraseniaC']) {
            
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasenia'] = $_POST['contrasenia'];
            $_SESSION['plan'] = isset($_POST['plan']) ? $_POST['plan'] : 'Estandar';

            echo "Registro con exito. Ahora puedes <a href='sesiones1full.php'>iniciar sesión</a>.";
            exit;
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="sesionesacceso.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required>
        <br>
        <label>Confirmar contraseña:</label>
        <input type="password" name="contraseniaC" required>
        <br>
        <label>Plan:</label>
        <input type="radio" name="plan" value="Estandar" checked> Estandar
        <input type="radio" name="plan" value="Premium"> Premium
        <br>
        <button type="submit" name="submit">Registrar</button>
    </form>
</body>
</html>
