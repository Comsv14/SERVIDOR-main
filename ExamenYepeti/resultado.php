<?php
// resultado.php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$fechaHoy = date("Y-m-d");

// Conexión a la base de datos
$host = 'localhost';
$db = 'JEROGLIFICO';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Se obtiene la solución correcta del día (suponiendo que la tabla solucion tiene los campos 'fecha' y 'solucion')
$stmt = $conn->prepare("SELECT solucion FROM solucion WHERE fecha = ?");
$stmt->bind_param("s", $fechaHoy);
$stmt->execute();
$resSol = $stmt->get_result();
if ($rowSol = $resSol->fetch_assoc()) {
    $solucionCorrecta = trim(strtolower($rowSol['solucion']));
} else {
    $solucionCorrecta = ""; // En caso de no existir, se puede definir un valor por defecto
}

// Se obtienen todas las respuestas de hoy (asumiendo que la columna fecha_hora almacena fecha y hora)
$stmt = $conn->prepare("SELECT login, solucion, fecha_hora FROM respuestas WHERE DATE(fecha_hora) = ?");
$stmt->bind_param("s", $fechaHoy);
$stmt->execute();
$result = $stmt->get_result();

$acertantes = [];
$fallados = [];

while ($row = $result->fetch_assoc()) {
    $solUsuario = trim(strtolower($row['solucion']));
    if ($solUsuario === $solucionCorrecta) {
        $acertantes[] = $row;
        // Sumar un punto al jugador que acertó
        $update = $conn->prepare("UPDATE jugador SET puntos = puntos + 1 WHERE login = ?");
        $update->bind_param("s", $row['login']);
        $update->execute();
    } else {
        $fallados[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Día</title>
</head>
<body>
    <h1>Resultados del Día (<?php echo $fechaHoy; ?>)</h1>
    <p>Número de jugadores que acertaron: <?php echo count($acertantes); ?></p>
    <p>Número de jugadores que fallaron: <?php echo count($fallados); ?></p>
    
    <h2>Jugadores Acertantes</h2>
    <ul>
        <?php foreach ($acertantes as $a): ?>
            <li><?php echo htmlspecialchars($a['login']) . " - " . $a['fecha_hora']; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Jugadores Fallados</h2>
    <ul>
        <?php foreach ($fallados as $f): ?>
            <li><?php echo htmlspecialchars($f['login']) . " - " . $f['fecha_hora']; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="inicio.php">Volver</a>
</body>
</html>
