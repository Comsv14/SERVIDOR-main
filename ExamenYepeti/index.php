<?php
// index.php
session_start();

// Conexión a la base de datos
$host = 'localhost';
$db = 'JEROGLIFICO';
$user = 'root';
$pass = ''; // Ajustar según configuración

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesamiento del formulario de login
if (isset($_POST['login']) && isset($_POST['clave'])) {
    $login = $_POST['login'];
    $clave = $_POST['clave'];
    
    // Consulta preparada para evitar inyección SQL
    $stmt = $conn->prepare("SELECT * FROM jugador WHERE login = ? AND clave = ?");
    $stmt->bind_param("ss", $login, $clave);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        // Login correcto
        $_SESSION['login'] = $login;
        header("Location: inicio.php");
        exit();
    } else {
        $error = "Login o clave incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required>
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
