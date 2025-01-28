<?php
require 'vendor/autoload.php';  // Asegúrate de tener el cliente MongoDB instalado con Composer

// Conexión a MongoDB
try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $database = $mongoClient->selectDatabase('calles_gijon');
    $collection = $database->selectCollection('eventos');
} catch (Exception $e) {
    die("Error al conectar con MongoDB: " . $e->getMessage());
}

// Manejo de operaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = (string)$_POST['id']; // Convertir el ID a string para usarlo en la búsqueda

        if ($action === 'modificar') {
            // Validar campos necesarios
            if (isset($_POST['titulo']) && isset($_POST['materia']) && isset($_POST['direccion_directorio'])) {
                $nuevoTitulo = $_POST['titulo'];
                $nuevaMateria = $_POST['materia'];
                $nuevaDireccion = $_POST['direccion_directorio'];

                try {
                    $result = $collection->updateOne(
                        ['id' => $id], // Filtro por ID
                        ['$set' => [
                            'titulo' => $nuevoTitulo,
                            'materia' => $nuevaMateria,
                            'direccion_directorio' => $nuevaDireccion,
                        ]]
                    );

                    if ($result->getMatchedCount() > 0) {
                        echo "Documento modificado exitosamente. <br>";
                    } else {
                        echo "No se encontró un documento con el ID proporcionado. <br>";
                    }
                } catch (Exception $e) {
                    echo "Error al modificar: " . $e->getMessage() . "<br>";
                }
            } else {
                echo "Faltan campos obligatorios para modificar. <br>";
            }
        }

        if ($action === 'borrar') {
            try {
                $result = $collection->deleteOne(['id' => $id]);

                if ($result->getDeletedCount() > 0) {
                    echo "Documento eliminado exitosamente. <br>";
                } else {
                    echo "No se encontró un documento con el ID proporcionado. <br>";
                }
            } catch (Exception $e) {
                echo "Error al borrar: " . $e->getMessage() . "<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar o Borrar Documentos</title>
</head>
<body>
    <h1>Gestión de Cajeros</h1>

    <!-- Formulario para modificar -->
    <h2>Modificar Evento</h2>
    <form method="POST">
        <label for="id">ID del Evento:</label>
        <input type="text" name="id" id="id" required><br>

        <label for="titulo">Nuevo Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="materia">Nueva Materia:</label>
        <input type="text" name="materia" id="materia" required><br>

        <label for="direccion_directorio">Nueva Dirección:</label>
        <input type="text" name="direccion_directorio" id="direccion_directorio" required><br>

        <input type="hidden" name="action" value="modificar">
        <button type="submit">Modificar</button>
    </form>

    <!-- Formulario para borrar -->
    <h2>Borrar Evento</h2>
    <form method="POST">
        <label for="id">ID del Evento:</label>
        <input type="text" name="id" id="id" required><br>

        <input type="hidden" name="action" value="borrar">
        <button type="submit">Borrar</button>
    </form>
</body>
</html>
