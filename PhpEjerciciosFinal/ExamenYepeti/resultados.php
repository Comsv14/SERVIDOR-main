<?php
session_start();
require 'conexion.php'; // Archivo con la conexión a la base de datos
$fecha_actual = '2024-12-12';

echo "<h2>Resultados del día: $fecha_actual</h2>";

// Obtener el nombre del usuario si está logueado
if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario']) && isset($_SESSION['usuario']['nombre'])) {
    echo "<p>Bienvenido, {$_SESSION['usuario']['nombre']}!</p>";
} elseif (isset($_SESSION['usuario'])) {
    echo "<p>Bienvenido, {$_SESSION['usuario']}!</p>";
}

// Obtener la solución correcta del día
$query_solucion = "SELECT solucion FROM solucion WHERE fecha = ?";
$stmt_solucion = $conn->prepare($query_solucion);
$stmt_solucion->execute([$fecha_actual]);
$solucion_data = $stmt_solucion->fetch(PDO::FETCH_ASSOC);
$solucion = $solucion_data ? $solucion_data['solucion'] : '';

// Contar jugadores que han acertado y fallado
$query_respuestas = "SELECT jugador.nombre, respuestas.hora, respuestas.respuesta 
                     FROM respuestas 
                     JOIN jugador ON respuestas.login = jugador.login 
                     WHERE respuestas.fecha = ?";
$stmt_respuestas = $conn->prepare($query_respuestas);
$stmt_respuestas->execute([$fecha_actual]);

$aciertos = [];
$fallos = [];
while ($row = $stmt_respuestas->fetch(PDO::FETCH_ASSOC)) {
    if (strcasecmp(trim($row['respuesta']), trim($solucion)) == 0) {
        $aciertos[] = $row;
    } else {
        $fallos[] = $row;
    }
}

echo "<p>Jugadores que acertaron: " . count($aciertos) . "</p>";
echo "<p>Jugadores que fallaron: " . count($fallos) . "</p>";

// Mostrar detalles de jugadores que acertaron
echo "<h3>Jugadores que acertaron:</h3>";
if (!empty($aciertos)) {
    echo "<ul>";
    foreach ($aciertos as $row) {
        echo "<li>{$row['nombre']} - {$row['hora']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay aciertos registrados.</p>";
}

// Mostrar detalles de jugadores que fallaron
echo "<h3>Jugadores que fallaron:</h3>";
if (!empty($fallos)) {
    echo "<ul>";
    foreach ($fallos as $row) {
        echo "<li>{$row['nombre']} - {$row['hora']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay fallos registrados.</p>";
}

// Actualizar puntos en la base de datos
$query_actualizar_puntos = "UPDATE jugador SET puntos = puntos + 1, extra = extra + 1 WHERE login IN 
                           (SELECT login FROM respuestas WHERE fecha = ? AND respuesta = ?)";
$stmt_actualizar_puntos = $conn->prepare($query_actualizar_puntos);
$stmt_actualizar_puntos->execute([$fecha_actual, $solucion]);

$query_restar_puntos = "UPDATE jugador SET puntos = puntos - 1, extra = extra + 1 WHERE login IN 
                        (SELECT login FROM respuestas WHERE fecha = ? AND respuesta <> ?)";
$stmt_restar_puntos = $conn->prepare($query_restar_puntos);
$stmt_restar_puntos->execute([$fecha_actual, $solucion]);

echo "<p>Puntos actualizados para los jugadores.</p>";

// Mostrar tabla de puntos actualizada
echo "<h3>Puntos por jugador:</h3>";
$query_puntos = "SELECT nombre, puntos FROM jugador ORDER BY puntos DESC";
$stmt_puntos = $conn->query($query_puntos);
echo "<table border='1'><tr><th>Jugador</th><th>Puntos</th></tr>";
while ($row = $stmt_puntos->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>{$row['nombre']}</td><td>{$row['puntos']}</td></tr>";
}
echo "</table>";
?>
