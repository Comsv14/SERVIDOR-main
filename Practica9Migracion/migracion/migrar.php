<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";
$base_datos = "mi_base_de_datos_migracion";

try {
    // Conexión a MySQL
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        throw new Exception("Conexión fallida: " . $conexion->connect_error);
    }

    // Conectar a MongoDB
    $mongo_client = new MongoDB\Client("mongodb://localhost:27017");
    $mongo_db = $mongo_client->mi_base_de_datos_migracion;
    $mongo_collection = $mongo_db->Empleados;

    // Leer datos de MySQL
    $sql = "SELECT * FROM Empleados";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($empleado = $resultado->fetch_assoc()) {
            // Insertar en MongoDB
            $mongo_collection->insertOne($empleado);
            echo "Registro {$empleado['CodEmple']} insertado en MongoDB.<br>";
        }
    } else {
        echo "No se encontraron registros en MySQL.";
    }

    // Cerrar la conexión
    $conexion->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>