<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h2>Formulario de Contacto</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar y limpiar los datos del formulario
        $nombre = trim($_POST["nombre"]);
        $email = trim($_POST["email"]);
        $mensaje = trim($_POST["mensaje"]);

        // Inicializar un array para almacenar errores
        $errores = [];

        // Validar que el nombre no esté vacío
        if (empty($nombre)) {
            $errores[] = "El nombre es requerido.";
        }

        // Validar que el email no esté vacío y tenga formato válido
        if (empty($email)) {
            $errores[] = "El correo electrónico es requerido.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo electrónico no es válido.";
        }

        // Validar que el mensaje no esté vacío
        if (empty($mensaje)) {
            $errores[] = "El mensaje es requerido.";
        }

        // Mostrar mensajes según el resultado de la validación
        if (empty($errores)) {
            echo "<p style='color:green;'>Formulario enviado con éxito.</p>";
            // Aquí podrías realizar otras acciones, como enviar un correo o guardar en una base de datos.
        } else {
            foreach ($errores as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        }
    }
    ?>

    <!-- Formulario HTML -->
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>"><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50"><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : ''; ?></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

