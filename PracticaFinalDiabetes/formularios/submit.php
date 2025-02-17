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
    echo "Error: " . $conn->error;
} else {
    echo "Datos guardados correctamente.";
}

$conn->close();
?>
