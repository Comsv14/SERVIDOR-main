<?php
require 'vendor/autoload.php'; // Asegúrate de instalar el cliente MongoDB con Composer.

try {
    // Conexión al servidor MongoDB
    $client = new MongoDB\Client("mongodb://localhost:27017");

    // Crear o seleccionar la base de datos
    $db = $client->mi_base_de_datos_mongoDB; // Si no existe, se crea automáticamente.

    // Crear o seleccionar la colección
    $coleccion = $db->mi_coleccion; // Si no existe, se crea automáticamente.

    // Insertar un documento de ejemplo en la colección
    $documento = [
        "nombre" => "Juan Pérez" // Solo incluimos el campo "nombre"
    ];
    $resultado = $coleccion->insertOne($documento);

    echo "Base de datos y colección creadas con éxito.\n";
    echo "Documento insertado con ID: " . $resultado->getInsertedId() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
