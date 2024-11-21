<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
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
        h1{ 
            text-align: center; 
            font-family: Arial Black; 
            font-weight: bold; 
            font-size: 30px; 
            color: #fff; 
            text-shadow: 0 1px 0 #ddd, 0 2px 0 #ccc, 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 0 #acacac, 0 6px 1px rgba(0,0,0,0.1), 0 0 5px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.3), 0 3px 5px rgba(0,0,0,0.2), 0 5px 10px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.2), 0 20px 20px rgba(0,0,0,0.15);
        }
        .pulse-effect {
            border: none;
            color: white;
            padding: 14px 28px;
            cursor: pointer;
            border-radius: 5px;
            background-color: #007bff; 
            transition: transform 0.3s ease-in-out; 
        }

        .pulse-effect:hover {
            background-color: #0056b3; 
        }

        .pulse-effect:active {
            transform: scale(0.90); 
        }
        a{
            color: #20bf6b !important;
            text-transform: uppercase;
            background: #ffffff;
            padding: 20px;
            border: 4px solid #20bf6b !important;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }
        a:hover {
            color: #494949 !important;
            border-radius: 50px;
            border-color: #494949 !important;
            transition: all 0.3s ease 0s;
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
        <button type="submit" class="btn pulse-effect" name="entrar">Entrar</button>
        <br></br>
        <a href="sesionesacceso.php">REGISTRARME</a>
    </form>
    </div>
</body>
</html>

