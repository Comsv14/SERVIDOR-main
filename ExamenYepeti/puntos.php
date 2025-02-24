<?php
// puntos.php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

// Conexión a la base de datos
$host = 'localhost';
$db = 'JEROGLIFICO';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Se extrae la información de los jugadores
$query = "SELECT login, puntos FROM jugador";
$result = $conn->query($query);
$jugadores = [];
while ($row = $result->fetch_assoc()) {
    $jugadores[] = $row;
}

// Determinar el máximo de puntos para escalar la gráfica
$maxPuntos = 0;
foreach ($jugadores as $j) {
    if ($j['puntos'] > $maxPuntos) {
        $maxPuntos = $j['puntos'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Puntos por Jugador</title>
    <style>
        .bar {
            height: 20px;
            background-color: #4285F4;
            margin: 2px 0;
        }
        .bar-container {
            background-color: #e0e0e0;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Puntos por Jugador</h1>
    <!-- Tabla de jugadores y puntos -->
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Jugador</th>
            <th>Puntos</th>
        </tr>
        <?php foreach ($jugadores as $jugador): ?>
            <tr>
                <td><?php echo htmlspecialchars($jugador['login']); ?></td>
                <td><?php echo $jugador['puntos']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>Gráfica de Puntos</h2>
    <?php foreach ($jugadores as $jugador):
        // Calcular el ancho relativo en porcentaje
        $porcentaje = ($maxPuntos > 0) ? round(($jugador['puntos'] / $maxPuntos) * 100) : 0;
    ?>
        <div>
            <?php echo htmlspecialchars($jugador['login']) . " (" . $jugador['puntos'] . " puntos)"; ?>
            <div class="bar-container">
                <div class="bar" style="width: <?php echo $porcentaje; ?>%;"></div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <br>
    <a href="inicio.php">Volver</a>
</body>
</html>
