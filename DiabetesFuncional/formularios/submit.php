<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "DiabetesDB";
$username = "root";  // Cambia esto si tienes otro usuario
$password = "";      // Cambia esto si tienes contraseña

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$fecha = $_POST['fecha'];
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];

$tipo_comida = $_POST['tipo_comida'];
$gl_1h = $_POST['gl_1h'];
$gl_2h = $_POST['gl_2h'];
$raciones = $_POST['raciones'];
$insulina = $_POST['insulina'];

$glucosa_hiper = $_POST['glucosa_hiper'];
$hora_hiper = $_POST['hora_hiper'];
$correccion = $_POST['correccion'];

$glucosa_hipo = $_POST['glucosa_hipo'];
$hora_hipo = $_POST['hora_hipo'];

$id_usu = 1; // Esto debería venir de la sesión del usuario autenticado

// Insertar datos en CONTROL_GLUCOSA
$sql_control = "INSERT INTO CONTROL_GLUCOSA (fecha, deporte, lenta, id_usu) 
                VALUES ('$fecha', $deporte, $lenta, $id_usu)";

$conn->query($sql_control);

// Insertar datos en COMIDA
$sql_comida = "INSERT INTO COMIDA (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) 
               VALUES ('$tipo_comida', $gl_1h, $gl_2h, $raciones, $insulina, '$fecha', $id_usu)";

$conn->query($sql_comida);

// Insertar datos en HIPERGLUCEMIA
$sql_hiper = "INSERT INTO HIPERGLUCEMIA (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
              VALUES ($glucosa_hiper, '$hora_hiper', $correccion, '$tipo_comida', '$fecha', $id_usu)";

$conn->query($sql_hiper);

// Insertar datos en HIPOGLUCEMIA
$sql_hipo = "INSERT INTO HIPOGLUCEMIA (glucosa, hora, tipo_comida, fecha, id_usu) 
             VALUES ($glucosa_hipo, '$hora_hipo', '$tipo_comida', '$fecha', $id_usu)";

$conn->query($sql_hipo);

// Verificar errores
if ($conn->error) {
    $mensaje = "Error: " . $conn->error;
    $color_mensaje = "red"; // Color para errores
} else {
    $mensaje = "Datos guardados correctamente.";
    $color_mensaje = "green"; // Color para éxito
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Envío</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Fondo con degradado elegante */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        /* Contenedor de la respuesta */
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            color: white;
        }

        /* Estilo de los enlaces */
        .login-container a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            color: #e67e22;
        }

        /* Estilo para los mensajes */
        .login-container p {
            margin-bottom: 20px;
            font-size: 16px;
            color: <?php echo $color_mensaje; ?>; /* Color dinámico según el mensaje */
        }

        /* Título (si lo necesitas) */
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Resultado del Envío</h2>
        <p><?php echo $mensaje; ?></p>
        <a href="escoger.php">Volver al formulario</a>
    </div>
</body>
</html>