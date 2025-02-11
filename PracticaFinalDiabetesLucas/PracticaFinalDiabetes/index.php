<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="auth.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <br>
    <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
</body>
</html>