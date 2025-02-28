<?php
session_start();
require 'conexion.php';

if (isset($_POST['login']) && isset($_POST['clave'])) {
    $login = trim($_POST['login']);
    $clave = trim($_POST['clave']);

    try {
        $stmt = $conn->prepare("SELECT nombre, login FROM jugador WHERE login = :login AND clave = :clave");
        $stmt->execute([
            ':login' => $login,
            ':clave' => $clave
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['usuario'] = [
                'nombre' => $usuario['nombre'],
                'login' => $usuario['login']
            ];
            header("Location: inicio.php");
            exit();
        } else {
            $error = "Login o clave incorrectos.";
        }
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
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
    <form method="post">
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
