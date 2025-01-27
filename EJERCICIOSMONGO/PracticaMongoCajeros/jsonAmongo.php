<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

try {
    // Conectar a MongoDB
    $mongo_client = new MongoDB\Client("mongodb://localhost:27017");
    $mongo_db = $mongo_client->mi_base_de_datos_gijonCalles; // Cambia el nombre de la base de datos si es necesario
    $mongo_collection = $mongo_db->eventos; // Cambia la colección a "eventos" o el nombre que prefieras

    // Leer el archivo JSON
    $json_data = file_get_contents('cajeros.json');
    $data = json_decode($json_data, true); // Decodificar como array asociativo

    // Verificar que los datos sean un array
    if (is_array($data)) {
        // Insertar datos en MongoDB
        $mongo_collection->insertMany($data);
        echo "Datos insertados en la colección 'eventos' con éxito.";
    } else {
        echo "Error: Los datos leídos del archivo JSON no son válidos.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
