<?php
session_start();
require_once 'conexion.php';

// Si no hay una sesión activa del puzzle, generamos una nueva disposición aleatoria
if (!isset($_SESSION['puzzle'])) {
    $_SESSION['puzzle'] = [
        ['num' => 1, 'pos' => rand(1, 4), 'rot' => rand(0, 3) * 90],
        ['num' => 2, 'pos' => rand(1, 4), 'rot' => rand(0, 3) * 90],
        ['num' => 3, 'pos' => rand(1, 4), 'rot' => rand(0, 3) * 90],
        ['num' => 4, 'pos' => rand(1, 4), 'rot' => rand(0, 3) * 90]
    ];
}

// Si se hace un movimiento, actualizar la sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['mover'])) {
        $pieza = $_POST['pieza'];
        $nueva_pos = $_POST['nueva_pos'];
        foreach ($_SESSION['puzzle'] as &$p) {
            if ($p['num'] == $pieza) {
                $p['pos'] = $nueva_pos;
            }
        }
    }
    if (isset($_POST['rotar'])) {
        $pieza = $_POST['pieza'];
        foreach ($_SESSION['puzzle'] as &$p) {
            if ($p['num'] == $pieza) {
                $p['rot'] = ($p['rot'] + 90) % 360;
            }
        }
    }
    if (isset($_POST['resolver'])) {
        // Solución esperada
        $solucion = [
            ['num' => 1, 'pos' => 1, 'rot' => 0],
            ['num' => 2, 'pos' => 2, 'rot' => 0],
            ['num' => 3, 'pos' => 3, 'rot' => 0],
            ['num' => 4, 'pos' => 4, 'rot' => 0]
        ];
        if ($_SESSION['puzzle'] == $solucion) {
            $mensaje = "¡Correcto!";
        } else {
            $mensaje = "Intenta de nuevo";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzzle Diario</title>
    <style>
        body { text-align: center; font-family: Arial, sans-serif; }
        .puzzle-container { display: grid; grid-template-columns: repeat(2, 100px); grid-template-rows: repeat(2, 100px); gap: 10px; margin: 20px auto; }
        .pieza { width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid black; font-size: 24px; background: white; }
    </style>
</head>
<body>
    <h1>Puzzle Diario</h1>
    <form method="POST">
        <div class="puzzle-container">
            <?php foreach ($_SESSION['puzzle'] as $p) : ?>
                <div class="pieza" style="transform: rotate(<?= $p['rot'] ?>deg);">
                    <?= $p['num'] ?>
                    <button type="submit" name="rotar" value="1">↻</button>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" name="resolver">Resolver</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>
