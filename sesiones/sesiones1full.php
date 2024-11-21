<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesion</title>
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
if (isset($_POST['entrar'])) {
    
    if (isset($_SESSION['usuario'], $_SESSION['contrasenia'])) {
        if ($_POST['usuario'] === $_SESSION['usuario'] && $_POST['contrasenia'] === $_SESSION['contrasenia']) {
            echo "<p><strong>Usuario: </strong>". $_SESSION['usuario'] ."</br>"."<strong>Plan: </strong>" . $_SESSION['plan']."</p>";
            exit;
        } else {
            echo '<p class="err">Usuario o contraseña incorrectos.</p>';
        }
    } else {
        echo "<p>No hay datos registrados. Por favor, <a href='sesionesacceso.php'>regístrate aquí</a>.</p>";
    }
}
?>

    <div>
    <h1>Iniciar Sesion</h1>
    <form action="sesiones1full.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br></br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required>
        <br></br>
        <a href="sesionesacceso.php">REGISTRARME</a>
        <br></br>
        <button type="submit" name="entrar">Entrar</button>
    </form>
    </div>
</body>
</html>

