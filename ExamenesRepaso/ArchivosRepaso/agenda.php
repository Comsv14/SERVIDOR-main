<?php
session_start();
include("conexion.php");

// Verificamos si el usuario está logueado
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

// Consultamos los contactos almacenados
$sql = "SELECT id, nombre, telefono, email FROM contactos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acción</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td>
                    <!-- Botón para editar, enviará el ID del contacto a editar.php -->
                    <form method="post" action="editar.php">
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <input type="submit" value="Editar">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
