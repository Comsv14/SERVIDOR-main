<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$esProfesor = $usuario['rol'] === 'profesor';

// Registrar examen (solo profesores)
if ($esProfesor && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar_examen'])) {
    $nombre_examen = $_POST['nombre_examen'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];

    $query = $conn->prepare("INSERT INTO Examenes (nombre_examen, fecha, descripcion, profesor_id) VALUES (:nombre, :fecha, :descripcion, :profesor_id)");
    $query->bindParam(':nombre', $nombre_examen);
    $query->bindParam(':fecha', $fecha);
    $query->bindParam(':descripcion', $descripcion);
    $query->bindParam(':profesor_id', $usuario['id']);
    $query->execute();
}

// Asignar o modificar nota (solo profesores)
if ($esProfesor && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['asignar_nota'])) {
    $alumno_id = $_POST['alumno_id'];
    $examen_id = $_POST['examen_id'];
    $nota = $_POST['nota'];

    $query = $conn->prepare("INSERT INTO Notas (examen_id, alumno_id, nota, fecha_entrega) 
        VALUES (:examen_id, :alumno_id, :nota, CURDATE())
        ON DUPLICATE KEY UPDATE nota = :nota");
    $query->bindParam(':examen_id', $examen_id);
    $query->bindParam(':alumno_id', $alumno_id);
    $query->bindParam(':nota', $nota);
    $query->execute();
}

// Obtener exámenes y notas
$examenes = $conn->query("SELECT * FROM Examenes")->fetchAll(PDO::FETCH_ASSOC);
$alumnos = $conn->query("SELECT * FROM Usuarios WHERE rol = 'alumno'")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal - Gestión de Clase</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?> (<?php echo $usuario['rol']; ?>)</h1>

    <a href="logout.php">Cerrar sesión</a>

    <?php if ($esProfesor): ?>
        <h2>Registrar nuevo examen</h2>
        <form method="POST">
            <label>Nombre del examen:</label><br>
            <input type="text" name="nombre_examen" required><br>
            <label>Fecha:</label><br>
            <input type="date" name="fecha" required><br>
            <label>Descripción:</label><br>
            <textarea name="descripcion"></textarea><br>
            <input type="submit" name="registrar_examen" value="Registrar Examen">
        </form>

        <h2>Asignar o Modificar Notas</h2>
        <form method="POST">
            <label>Seleccionar Examen:</label><br>
            <select name="examen_id" required>
                <?php foreach ($examenes as $examen): ?>
                    <option value="<?php echo $examen['id']; ?>">
                        <?php echo htmlspecialchars($examen['nombre_examen']) . " - " . $examen['fecha']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Seleccionar Alumno:</label><br>
            <select name="alumno_id" required>
                <?php foreach ($alumnos as $alumno): ?>
                    <option value="<?php echo $alumno['id']; ?>">
                        <?php echo htmlspecialchars($alumno['nombre']) . " - " . $alumno['email']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Nota:</label><br>
            <input type="number" name="nota" min="0" max="10" step="0.1" required><br>
            <input type="submit" name="asignar_nota" value="Asignar/Modificar Nota">
        </form>
    <?php endif; ?>

    <h2>Exámenes y Notas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Examen</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examenes as $examen): ?>
                <?php
                $nota = null;
                if (!$esProfesor) {
                    $query = $conn->prepare("SELECT nota FROM Notas WHERE examen_id = :examen_id AND alumno_id = :alumno_id");
                    $query->bindParam(':examen_id', $examen['id']);
                    $query->bindParam(':alumno_id', $usuario['id']);
                    $query->execute();
                    $nota = $query->fetchColumn();
                }
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($examen['nombre_examen']); ?></td>
                    <td><?php echo $examen['fecha']; ?></td>
                    <td><?php echo htmlspecialchars($examen['descripcion']); ?></td>
                    <td><?php echo $esProfesor ? 'N/A' : ($nota !== null ? $nota : 'Pendiente'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
