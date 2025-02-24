<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "JEROGLIFICO");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Iniciar sesión
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_SESSION['login'];
    $respuesta = trim($_POST['respuesta']);
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    // Verificar si la solución existe en la tabla solucion
    $consultaSolucion = $conexion->prepare("SELECT solucion FROM solucion WHERE fecha = ?");
    $consultaSolucion->bind_param("s", $fecha);
    $consultaSolucion->execute();
    $resultadoSolucion = $consultaSolucion->get_result();
    $filaSolucion = $resultadoSolucion->fetch_assoc();

    if ($filaSolucion) {
        $solucionCorrecta = trim($filaSolucion['solucion']);

        // Insertar la respuesta del usuario en la tabla respuestas
        $insertarRespuesta = $conexion->prepare("INSERT INTO respuestas (fecha, login, hora, respuesta) VALUES (?, ?, ?, ?)");
        $insertarRespuesta->bind_param("ssss", $fecha, $login, $hora, $respuesta);

        if ($insertarRespuesta->execute()) {
            // Verificar si la respuesta es correcta
            if (strcasecmp($respuesta, $solucionCorrecta) == 0) {
                // Sumar un punto al jugador si acierta
                $sumarPunto = $conexion->prepare("UPDATE jugador SET puntos = puntos + 1 WHERE login = ?");
                $sumarPunto->bind_param("s", $login);
                $sumarPunto->execute();
                $sumarPunto->close();

                echo "✅ Respuesta correcta. Se ha sumado un punto.";
            } else {
                echo "❌ Respuesta incorrecta. Inténtelo de nuevo.";
            }
        } else {
            echo "❌ Error al guardar la respuesta: " . $insertarRespuesta->error;
        }

        $insertarRespuesta->close();
    } else {
        echo "⚠️ No hay un jeroglífico registrado para hoy. Inténtelo más tarde.";
    }

    // Cerrar consultas y conexión
    $consultaSolucion->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio - Jeroglífico del Día</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['login']); ?></h1>

    <!-- Formulario para introducir la respuesta -->
    <form method="POST" action="inicio.php">
        <label for="respuesta">Introduce tu solución:</label><br>
        <input type="text" id="respuesta" name="respuesta" required><br><br>
        <input type="submit" value="Enviar">
    </form>

    <br>

    <!-- Botones para ver puntos y resultados -->
    <a href="puntos.php">Ver puntos por jugador</a> |
    <a href="resultados.php">Resultados del día</a>
</body>
</html>
