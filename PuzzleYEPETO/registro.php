<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = trim($_POST['email']);
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $query = $conn->prepare("INSERT INTO usuarios (nombre, email, clave, rol) VALUES (:nombre, :email, :clave, :rol)");
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':email', $email);
    $query->bindParam(':clave', $clave);
    $query->bindParam(':rol', $rol);

    if ($query->execute()) {
        echo "Registro exitoso. <a href='index.php'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar usuario.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro - Puzzle</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST" action="registro.php">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="clave" required><br>
        <label>Rol:</label><br>
        <select name="rol" required>
            <option value="alumno">Alumno</option>
            <option value="profesor">Profesor</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
    <p>¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a></p>
</body>
</html>
