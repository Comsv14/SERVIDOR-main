<?php
session_start();

include 'conexion.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

// Consulta para verificar las credenciales
$sql = "SELECT id_usu FROM USUARIO WHERE usuario = '$usuario' AND contra = '$contra'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
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
        <?php if ($result->num_rows > 0): ?>
            <?php 
            $row = $result->fetch_assoc();
            $_SESSION['id_usu'] = $row['id_usu']; // Guardar ID de usuario en la sesión
            header("Location: formularios/escoger.php"); // Redirigir a la página principal
            ?>
        <?php else: ?>
            <p>Usuario o contraseña incorrectos.</p>
            <a href="index.php">Inténtalo de nuevo</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
