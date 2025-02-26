<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = hash('sha256', $_POST['clave']);
    $rol = $_POST['rol'];

    $query = $conn->prepare("INSERT INTO Usuarios (nombre, email, clave, rol) VALUES (:nombre, :email, :clave, :rol)");
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
    <title>Registro - Gestión de Clase</title>
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
