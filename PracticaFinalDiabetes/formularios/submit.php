<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usu'])) {
    die("Error: Usuario no autenticado.");
}

// Conexión a la base de datos
$host = "localhost";
$dbname = "diabetesdb";
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

// Obtener el ID del usuario autenticado desde la sesión
$id_usu = $_SESSION['id_usu'];

// Insertar datos en CONTROL_GLUCOSA
$sql_control = "INSERT INTO CONTROL_GLUCOSA (fecha, deporte, lenta, id_usu) 
                VALUES ('$fecha', $deporte, $lenta, $id_usu)";

$conn->query($sql_control);

// Insertar datos en HIPERGLUCEMIA
$sql_hiper = "INSERT INTO HIPERGLUCEMIA (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
              VALUES ($glucosa_hiper, '$hora_hiper', $correccion, '$tipo_comida', '$fecha', $id_usu)";

$conn->query($sql_hiper);

// Insertar datos en HIPOGLUCEMIA
$sql_hipo = "INSERT INTO HIPOGLUCEMIA (glucosa, hora, tipo_comida, fecha, id_usu) 
             VALUES ($glucosa_hipo, '$hora_hipo', '$tipo_comida', '$fecha', $id_usu)";

// Verificar cuántas comidas tiene el usuario en el día
$sql_check_comidas = "SELECT COUNT(*) AS total_comidas 
                      FROM COMIDA 
                      WHERE fecha = '$fecha' AND id_usu = $id_usu";
$result_check = $conn->query($sql_check_comidas);
$row = $result_check->fetch_assoc();

if ($row['total_comidas'] < 3) {
    // Si tiene menos de 3 comidas, insertar la nueva comida
    $sql_comida = "INSERT INTO COMIDA (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) 
                   VALUES ('$tipo_comida', $gl_1h, $gl_2h, $raciones, $insulina, '$fecha', $id_usu)";
    $conn->query($sql_comida);
    
    // Mensaje de éxito
    $mensaje = "Comida añadida correctamente.";
    $color_mensaje = "green";
} else {
    // Si ya tiene 3 comidas, mostrar un mensaje de error
    $mensaje = "Ya has añadido 3 comidas en este día. No puedes añadir más.";
    $color_mensaje = "red";
}

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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

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

        .login-container a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            color: #e67e22;
        }

        .login-container p {
            margin-bottom: 20px;
            font-size: 16px;
            color: <?php echo $color_mensaje; ?>;
        }

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
