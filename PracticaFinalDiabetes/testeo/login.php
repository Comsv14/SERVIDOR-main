<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT id_usu, contra FROM USUARIO WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && $password == $stored_password) {
        $_SESSION['user_id'] = $id;
        header("Location: home.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<form method="POST">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Iniciar Sesión</button>
</form>
<a href="register.php">Registrar nuevo usuario</a>
