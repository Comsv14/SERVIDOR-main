<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usu'])) {
    header("Location: index.php"); // Redirige al login si no está autenticado
    exit();
}

// Array de emojis disponibles
$emojis = ["images/OIP0.jpg", "images/OIP1.jpg", "images/OIP2.jpg", "images/OIP3.jpg", "images/OIP4.jpg"];

// Inicializar los contactos si no están definidos o si no son un array
if (!isset($_SESSION['contactos']) || !is_array($_SESSION['contactos'])) {
    $_SESSION['contactos'] = [];
}

// Incrementar el número de contactos
if (isset($_POST['incrementar'])) {
    if (count($_SESSION['contactos']) < 5) {
        $nuevoEmoji = $emojis[array_rand($emojis)];
        $_SESSION['contactos'][] = $nuevoEmoji;

        // Si llega a 5 contactos, redirigir automáticamente
        if (count($_SESSION['contactos']) == 5) {
            header("Location: siguiente_pantalla.php");
            exit();
        }
    }
}

// Grabar contactos
if (isset($_POST['grabar'])) {
    $_SESSION['contactos'] = []; // Reiniciar contactos como un array vacío
    echo "<script>alert('Contactos grabados correctamente.'); window.location.reload();</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar - Incrementar Contactos</title>
    <style>
        .emoji {
            width: 50px;
            height: 50px;
            margin: 5px;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <h1>AGENDA</h1>
    <p>Hola <?php echo htmlspecialchars($_SESSION['usu']); ?>, ¿cuántos contactos deseas grabar?</p>
    <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</p>
    <p>Cuando el número sea el deseado pulsa GRABAR.</p>

    <div>
        <?php 
        // Verificar que $_SESSION['contactos'] sea un array antes de recorrerlo
        if (is_array($_SESSION['contactos'])) {
            foreach ($_SESSION['contactos'] as $emoji): ?>
                <img src="<?php echo $emoji; ?>" alt="emoji" class="emoji">
            <?php endforeach;
        } else {
            echo "<p>No hay contactos disponibles.</p>";
        }
        ?>
    </div>

    <form method="POST">
        <button type="submit" name="incrementar">INCREMENTAR</button>
        <button type="submit" name="grabar">GRABAR</button>
    </form>
</body>
</html>
