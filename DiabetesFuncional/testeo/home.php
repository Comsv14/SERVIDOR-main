<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Bienvenido</h1>
<ul>
    <li><a href="control_glucosa.php">Ingresar control de glucosa</a></li>
    <li><a href="comida.php">Ingresar comidas</a></li>
    <li><a href="hipoglucemia.php">Registrar hipoglucemia</a></li>
    <li><a href="hiperglucemia.php">Registrar hiperglucemia</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>
