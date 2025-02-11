<?php
session_start();

// Incluir archivo de conexión
include '../conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar los valores del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    $contra = $_POST['contra'] ?? null;
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;

    // Validar que los valores no sean null
    if ($nombre && $apellidos && $usuario && $contra && $fecha_nacimiento) {

        // Verificar si el usuario ya existe
        $sql_check = "SELECT id_usu FROM USUARIO WHERE usuario = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $usuario);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            echo "El usuario ya está registrado. <a href='register.php'>Intenta con otro nombre de usuario</a>";
        } else {
            // Insertar datos en la tabla USUARIO
            $sql_insert = "INSERT INTO USUARIO (fecha_nacimiento, nombre, apellidos, usuario, contra)
                           VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sssss", $fecha_nacimiento, $nombre, $apellidos, $usuario, $contra);

            if ($stmt_insert->execute()) {
                echo "Registro exitoso. <a href='login.php'>Inicia sesión aquí</a>";
            } else {
                echo "Error: " . $stmt_insert->error;
            }

            $stmt_insert->close();
        }

        $stmt_check->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}

$conn->close();
?>