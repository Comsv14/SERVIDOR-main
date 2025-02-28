<?php

/**
 * Archivo de referencia rápida para examen de PHP y SQL
 */

// 1. Conectar a la base de datos
$host = 'localhost';
$user = 'root'; // Cambia según lo que te den
$pass = ''; // Puede estar vacío o tener clave
$dbname = 'nombre_de_la_base'; // Cambia según lo que te den

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// 2. Consultas SQL útiles

// Seleccionar todos los datos de una tabla
$sql = "SELECT * FROM nombre_tabla";
$result = $conn->query($sql);

// Recorrer resultados
while ($row = $result->fetch_assoc()) {
    echo $row['columna'] . "<br>";
}

// Seleccionar con condición
$sql = "SELECT * FROM nombre_tabla WHERE columna = 'valor'";

// Contar registros
$sql = "SELECT COUNT(*) AS total FROM nombre_tabla";

// Obtener el máximo o mínimo
$sql = "SELECT MAX(columna) FROM nombre_tabla";
$sql = "SELECT MIN(columna) FROM nombre_tabla";

// Agrupar resultados
$sql = "SELECT columna, COUNT(*) FROM nombre_tabla GROUP BY columna";

// Ordenar resultados
$sql = "SELECT * FROM nombre_tabla ORDER BY columna ASC";

// Limitar resultados
$sql = "SELECT * FROM nombre_tabla LIMIT 10";

// Insertar datos
$sql = "INSERT INTO nombre_tabla (col1, col2) VALUES ('valor1', 'valor2')";

// Actualizar datos
$sql = "UPDATE nombre_tabla SET col1 = 'nuevo_valor' WHERE id = 1";

// Eliminar datos
$sql = "DELETE FROM nombre_tabla WHERE id = 1";

// Ejecutar consulta y verificar errores
if ($conn->query($sql) === TRUE) {
    echo "Operación realizada correctamente";
} else {
    echo "Error: " . $conn->error;
}

// Cerrar conexión
$conn->close();

?>
