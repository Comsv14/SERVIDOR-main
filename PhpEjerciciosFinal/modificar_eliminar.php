<?php
// Requiere el cliente MongoDB
require 'vendor/autoload.php';  // Asegúrate de que el cliente MongoDB esté instalado

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos
$database = $mongoClient->cajeros_gijon;  // Aquí está tu base de datos de MongoDB

// Seleccionar la colección (equivalente a la tabla en MySQL)
$collection = $database->personas;  // Aquí está tu colección (tabla)

// Procesar la acción del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST["accion"];
    $id = $_POST["id"];

    if ($accion === "modificar") {
        $campo = $_POST["campo"];
        $nuevo_valor = $_POST["nuevo_valor"];

        // Modificar el registro en MongoDB
        $result = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],  // Filtrar por el ID del registro
            ['$set' => [$campo => $nuevo_valor]]  // Actualizar el campo
        );

        if ($result->getModifiedCount() > 0) {
            echo "Registro actualizado.";
        } else {
            echo "No se encontró el registro o no se realizaron cambios.";
        }
    } elseif ($accion === "eliminar") {
        // Eliminar el registro de MongoDB
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

        if ($result->getDeletedCount() > 0) {
            echo "Registro eliminado.";
        } else {
            echo "No se encontró el registro.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar o Eliminar Datos</title>
</head>
<body>
    <h2>Modificar o Eliminar Datos</h2>
    <form method="post">
        <label>ID del registro:</label>
        <input type="text" name="id" required> <!-- Usamos texto porque MongoDB usa ObjectId -->

        <label>Acción:</label>
        <select name="accion">
            <option value="modificar">Modificar</option>
            <option value="eliminar">Eliminar</option>
        </select>

        <div id="modificarCampos">
            <label>Campo a modificar:</label>
            <input type="text" name="campo">
            <label>Nuevo valor:</label>
            <input type="text" name="nuevo_valor">
        </div>

        <button type="submit">Ejecutar</button>
    </form>
</body>
</html>
