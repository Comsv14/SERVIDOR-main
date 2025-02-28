<?php
session_start();
include("conexion.php");

// Verificar si hay ID de contacto enviado
if (!isset($_POST['id'])) {
    header("Location: agenda.php");
    exit();
}

$id = $_POST['id'];

// Obtener los datos actuales del contacto
$sql = "SELECT nombre, telefono, email FROM contactos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$contacto = $resultado->fetch_assoc();

if (!$contacto) {
    echo "El contacto no existe.";
    exit();
}

// Si el formulario se envía, actualizar el contacto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "UPDATE contactos SET nombre = ?, telefono = ?, email = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $telefono, $email, $id);

    if ($stmt->execute()) {
        header("Location: agenda.php");
        exit();
    } else {
        echo "Error al actualizar el contacto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $contacto['nombre']; ?>" required>
        <br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $contacto['telefono']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $contacto['email']; ?>" required>
        <br>
        <input type="submit" name="actualizar" value="Guardar Cambios">
    </form>
    <br>
    <a href="agenda.php">Volver a la agenda</a>
</body>
</html>
