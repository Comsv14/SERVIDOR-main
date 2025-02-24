<?php
require 'vendor/autoload.php';  // Asegúrate de que el cliente MongoDB esté correctamente cargado

// Establecer conexión con MongoDB
$mongoClient = new MongoDB\Client("mongodb://root:@localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->selectDatabase('cajeros_gijon');
$collection = $database->selectCollection('personas'); // Cambia "personas" al nombre de tu colección

// Consultar todos los documentos de la colección
$cursor = $collection->find();  // Esto devuelve todos los documentos

// Mostrar los resultados
echo "<h2>Datos de la colección 'personas'</h2>";
echo "<table border='1'><tr><th>Campo</th><th>Valor</th></tr>";

foreach ($cursor as $document) {
    foreach ($document as $campo => $valor) {
        echo "<tr><td>" . htmlspecialchars($campo) . "</td><td>" . htmlspecialchars($valor) . "</td></tr>";
    }
}

echo "</table>";
?>
