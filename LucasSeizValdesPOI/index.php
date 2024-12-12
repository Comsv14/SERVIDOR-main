<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title> 
    <style>
        .err{
            color: red;
        }
    </style>
</head>
<body>
<?php
session_start();
require_once 'login.php';    
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!empty($_POST['login']) && !empty($_POST['clave'])) {
    $input_usuario = $_POST['login']; 
    $input_password = $_POST['clave'];

    $_SESSION['login'] = $input_usuario;

    
    $query = "SELECT clave, login, nombre, puntos FROM jugador WHERE login = '$input_usuario' AND clave = '$input_password'";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        $_SESSION['nombre'] = htmlspecialchars($result->fetch_assoc()['nombre']);
        $row = $result->fetch_assoc(); 
        echo<<<_END
        <meta http-equiv="refresh" content="0;URL='inicio.php'" />
    _END; 
        exit;
    } else {
        echo '<div class="container">';
        echo '<p class="err">Credenciales Incorrectas. Intentalo de nuevo.</p>';
        echo '</div>';
    }
}
$conn->close();
?>

<div class="container">
    <h1>Inicio de Sesion</h1>
    <form method="post" action="#">
        <label for="usu">Usuario:</label>
        <input type="text" id="login" name="login" required>
        <br><br>
        <label for="contra">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
