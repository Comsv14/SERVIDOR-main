<?php
$pdo = new PDO("mysql:host=localhost;dbname=calles_gijon", "usuario", "contraseña");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM eventos");
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Eventos</title>
</head>
<body>
    <h2>Eventos Disponibles</h2>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Tipo</th>
            <th>Fecha Inicio</th>
            <th>Ubicación</th>
        </tr>
        <?php foreach ($eventos as $evento): ?>
        <tr>
            <td><?= $evento['titulo'] ?></td>
            <td><?= $evento['tipo'] ?></td>
            <td><?= $evento['fecha_inicio'] ?></td>
            <td><?= $evento['direccion_directorio'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
