<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        div{
            text-align: center;
        }
        p.err{
            text-align: center;
            color: red;
        }
        p{
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
            
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasenia'] = $_POST['contrasenia'];
            $_SESSION['plan'] = isset($_POST['plan']) ? $_POST['plan'] : 'Estandar';

            echo "<p>Registro con exito. Ahora puedes <a href='sesiones1full.php'>iniciar sesión</a>.</p>";
            exit;
        } else {
            echo "<p class='err'>Las contraseñas no coinciden.</p>";
        }
    } else {
        echo "<p class='err'>Todos los campos son obligatorios.</p>";
    }
}
?>

    <div>
    <h1>Registro</h1>
    <form action="sesionesacceso.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br></br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required>
        <br></br>
        <label>Confirmar contraseña:</label>
        <input type="password" name="contraseniaC" required>
        <br></br>
        <label>Plan:</label>
        <input type="radio" name="plan" value="Estandar" required> Estandar
        <input type="radio" name="plan" value="Premium" required> Premium
        <br></br>
        <button type="submit" name="submit">Registrar</button>
        <br></br>
        <a href="sesiones1full.php">Volver</a>
    </form>
    </div>
</body>
</html>
