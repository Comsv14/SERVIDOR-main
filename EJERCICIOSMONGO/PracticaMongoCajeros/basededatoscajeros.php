<?php

// Requiere el cliente MongoDB
require 'vendor/autoload.php';  // Asegúrate de tener el cliente MongoDB instalado con Composer

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar (o crear si no existe) la base de datos 'calles_gijon'
$database = $mongoClient->selectDatabase('calles_gijon');

// Seleccionar (o crear si no existe) la colección 'eventos'
$collection = $database->selectCollection('eventos');

// Verificar si el archivo cajeros.json existe
$jsonFile = 'cajeros.json';
if (file_exists($jsonFile)) {
    // Leer el contenido del archivo JSON
    $jsonData = file_get_contents($jsonFile);
    
    // Decodificar el JSON en un array de PHP
    $eventos = json_decode($jsonData, true);  // true para convertir en array asociativo

    // Insertar los datos en la base de datos
    try {
        foreach ($eventos as $evento) {
            // Si existe un campo _id, eliminarlo para evitar duplicados
            unset($evento['_id']);  // MongoDB generará un _id automáticamente
            $result = $collection->insertOne($evento);  // Insertar evento
            echo "Evento insertado con ID: " . $result->getInsertedId() . "<br>";
        }
    } catch (Exception $e) {
        echo "Error al insertar datos: " . $e->getMessage();
    }
} else {
    echo "El archivo cajeros.json no se encuentra.";
}

?>
