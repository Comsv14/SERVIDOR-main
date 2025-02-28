<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$login = $_SESSION['login'];
$fecha = "2024-12-12"; // Fecha fija
$hora = date("H:i:s"); // Hora actual
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuesta = trim($_POST['respuesta']);

    // Obtener la solución correcta del día (2024-12-12)
    $sql = "SELECT solucion FROM solucion WHERE fecha = '$fecha'";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_assoc();

    if ($fila) {
        $solucionCorrecta = trim($fila['solucion']);

        // Guardar la respuesta del usuario en la tabla 'respuestas'
        $sql_insert = "INSERT INTO respuestas (fecha, login, hora, respuesta) VALUES ('$fecha', '$login', '$hora', '$respuesta')";
        $conexion->query($sql_insert);

        // Comparar la respuesta con la solución correcta
        if (strcasecmp($respuesta, $solucionCorrecta) == 0) {
            $conexion->query("UPDATE jugador SET puntos = puntos + 1 WHERE login = '$login'");
            $mensaje = "✅ Respuesta correcta. ¡Has ganado 1 punto!";
        } else {
            $mensaje = "❌ Respuesta incorrecta. Inténtalo de nuevo.";
        }
    } else {
        $mensaje = "⚠️ No hay un jeroglífico registrado para la fecha 2024-12-12.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Jeroglífico del Día</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($login); ?></h1>
    <?php if ($mensaje) echo "<p>$mensaje</p>"; ?>

    <form method="POST" action="">
        <label for="respuesta">Introduce tu solución:</label><br>
        <input type="text" name="respuesta" required><br><br>
        <input type="submit" value="Enviar">
    </form>

    <br>
    <a href="puntos.php">Ver puntos</a> |
    <a href="resultados.php">Ver resultados</a>
</body>
</html>
