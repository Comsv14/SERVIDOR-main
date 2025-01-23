<?php
$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";

try {
    // Conexión al servidor MySQL
    $conexion = new mysqli($servidor, $usuario, $contrasena);

    // Verificar la conexión
    if ($conexion->connect_error) {
        throw new Exception("Conexión fallida: " . $conexion->connect_error);
    }

    // Crear la base de datos
    $sql_db = "CREATE DATABASE IF NOT EXISTS mi_base_de_datos_migracion";
    if ($conexion->query($sql_db) === TRUE) {
        echo "Base de datos creada con éxito.<br>";
    } else {
        throw new Exception("Error creando la base de datos: " . $conexion->error);
    }

    // Seleccionar la base de datos
    $conexion->select_db('mi_base_de_datos_migracion');

    // Crear una tabla
    $sql_tabla = "CREATE TABLE Empleados (
        CodEmple INT PRIMARY KEY,
        Nombre VARCHAR(50),
        Apellido1 VARCHAR(50),
        Apellido2 VARCHAR(50),
        Departamento INT
    )";

    if ($conexion->query($sql_tabla) === TRUE) {
        echo "Tabla creada con éxito.<br>";
    } else {
        throw new Exception("Error creando la tabla: " . $conexion->error);
    }

    // Insertar 50 registros en la tabla
    $empleados = [
        [1, 'Ana', 'Fuentes', 'Teruel', 3],
        [2, 'Luis', 'Marea', 'Motos', 3],
        [3, 'Carlos', 'Gómez', 'Pérez', 1],
        [4, 'María', 'López', 'Sánchez', 2],
        [5, 'Pedro', 'Martínez', 'Hernández', 1],
        [6, 'Laura', 'Jiménez', 'Torres', 4],
        [7, 'Javier', 'Ramírez', 'Cruz', 5],
        [8, 'Sofía', 'Morales', 'Reyes', 2],
        [9, 'Diego', 'Vázquez', 'Rojas', 3],
        [10, 'Isabel', 'Pérez', 'Flores', 4],
        [11, 'Raúl', 'Castillo', 'García', 1],
        [12, 'Claudia', 'Salazar', 'Mendoza', 2],
        [13, 'Fernando', 'Ortega', 'Ríos', 5],
        [14, 'Verónica', 'Cervantes', 'Salas', 4],
        [15, 'Andrés', 'Núñez', 'Díaz', 1],
        [16, 'Patricia', 'Hernández', 'Pérez', 3],
        [17, 'Gabriel', 'Soto', 'Aguilar', 2],
        [18, 'Carmen', 'Vega', 'López', 5],
        [19, 'Eduardo', 'Martín', 'Alonso', 4],
        [20, 'Nadia', 'Cruz', 'Márquez', 1],
        [21, 'Marta', 'Serrano', 'Cordero', 2],
        [22, 'Samuel', 'Rivas', 'Bermúdez', 3],
        [23, 'Lina', 'Téllez', 'Pérez', 5],
        [24, 'Arturo', 'Figueroa', 'Salas', 4],
        [25, 'Cristina', 'Lara', 'Soto', 1],
        [26, 'Gustavo', 'Castañeda', 'Cruz', 2],
        [27, 'Diana', 'González', 'Morales', 3],
        [28, 'José', 'Hidalgo', 'Reyes', 5],
        [29, 'Silvia', 'Maldonado', 'García', 4],
        [30, 'Rafael', 'Pérez', 'Torres', 1],
        [31, 'Elena', 'Martínez', 'Mora', 2],
        [32, 'Victor', 'Rojas', 'Salazar', 3],
        [33, 'Alberto', 'Sáenz', 'Cruz', 5],
        [34, 'Teresa', 'Salinas', 'Mendoza', 4],
        [35, 'Hugo', 'González', 'Hernández', 1],
        [36, 'Estela', 'Cordero', 'Jiménez', 2],
        [37, 'Ramiro', 'Ceballos', 'Salas', 3],
        [38, 'Patricia', 'López', 'Reyes', 5],
        [39, 'Manuel', 'Pacheco', 'Torres', 4],
        [40, 'Rosa', 'Pérez', 'Sánchez', 1],
        [41, 'César', 'Alvarez', 'Cruz', 2],
        [42, 'Lucía', 'Ríos', 'Mendoza', 3],
        [43, 'Antonio', 'Sierra', 'Salinas', 5],
        [44, 'Beatriz', 'Martínez', 'González', 4],
        [45, 'Julio', 'García', 'Torres', 1],
        [46, 'Fabiola', 'Hernández', 'Reyes', 2],
        [47, 'Nicolás', 'Mora', 'Ceballos', 3],
        [48, 'Adriana', 'Vásquez', 'Pérez', 5],
        [49, 'Julián', 'Salazar', 'Maldonado', 4],
        [50, 'Santiago', 'Cruz', 'Vega', 1],
    ];

    foreach ($empleados as $empleado) {
        $codEmple = $empleado[0];
        $nombre = $empleado[1];
        $apellido1 = $empleado[2];
        $apellido2 = $empleado[3];
        $departamento = $empleado[4];

        $sql_insert = "INSERT INTO Empleados (CodEmple, Nombre, Apellido1, Apellido2, Departamento)
                       VALUES ($codEmple, '$nombre', '$apellido1', '$apellido2', $departamento)";

        if ($conexion->query($sql_insert) === TRUE) {
            echo "Registro $codEmple insertado con éxito.<br>";
        } else {
            throw new Exception("Error insertando registro $codEmple: " . $conexion->error);
        }
    }

    // Cerrar la conexión
    $conexion->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>