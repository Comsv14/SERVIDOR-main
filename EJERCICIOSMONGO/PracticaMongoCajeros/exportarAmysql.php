<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

// Conectar a MySQL
$mysqli = new mysqli("localhost:3306", "root", ""); // Cambia las credenciales según sea necesario

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Crear la base de datos si no existe
$db_creation_query = "CREATE DATABASE IF NOT EXISTS mi_base_de_datos_mysql_cajeros";
if ($mysqli->query($db_creation_query) === TRUE) {
    echo "Base de datos 'mi_base_de_datos_mysql_cajeros' creada o ya existe.\n";
} else {
    echo "Error al crear la base de datos: " . $mysqli->error . "\n";
}

// Seleccionar la base de datos
$mysqli->select_db("mi_base_de_datos_mysql_cajeros");

// Leer el archivo JSON completo
$json_data = file_get_contents('cajeros.json');
$data = json_decode($json_data, true); // Decodificar como array asociativo

if ($data === null) {
    die("Error: No se pudo decodificar el archivo JSON.\n");
}

// Verificar si el JSON es una lista o un objeto con múltiples entradas
if (!is_array($data)) {
    die("Error: El archivo JSON no contiene datos válidos para exportar.\n");
}

// Determinar las claves (columnas) automáticamente del primer registro
$columns = array_keys($data[0]);

// Crear la tabla dinámicamente con las columnas encontradas
$table_creation_query = "CREATE TABLE IF NOT EXISTS eventos_dynamic (";
foreach ($columns as $column) {
    // Sanitizar y definir las columnas como TEXT por defecto (puedes ajustar esto según el tipo de dato)
    $table_creation_query .= "`$column` TEXT, ";
}
$table_creation_query .= "id INT AUTO_INCREMENT PRIMARY KEY);";

if ($mysqli->query($table_creation_query) === TRUE) {
    echo "Tabla 'eventos_dynamic' creada o ya existe.\n";
} else {
    echo "Error al crear la tabla: " . $mysqli->error . "\n";
}

// Insertar los datos del JSON en la tabla dinámica
$insert_query_base = "INSERT INTO eventos_dynamic (" . implode(", ", $columns) . ") VALUES (";
$insert_query_base .= str_repeat("?, ", count($columns) - 1) . "?);";

$stmt = $mysqli->prepare($insert_query_base);
if (!$stmt) {
    die("Error al preparar la consulta: " . $mysqli->error . "\n");
}

// Insertar cada registro
foreach ($data as $row) {
    // Asegurarse de que todas las columnas tengan valores (incluso si son nulos)
    $values = [];
    foreach ($columns as $column) {
        $values[] = $row[$column] ?? null; // Insertar null si la columna no existe en el registro
    }

    // Llamar al método bind_param dinámicamente
    $types = str_repeat("s", count($values)); // Todo tratado como string por simplicidad
    $stmt->bind_param($types, ...$values);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Error al insertar un registro: " . $stmt->error . "\n";
    }
}

echo "Todos los datos del JSON se exportaron correctamente a MySQL.\n";

// Cerrar conexiones
$stmt->close();
$mysqli->close();
?>
