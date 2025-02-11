<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $deporte = $_POST['deporte'];
    $lenta = $_POST['lenta'];
    $id_usu = $_SESSION['user_id'];

    $sql = "INSERT INTO CONTROL_GLUCOSA (fecha, deporte, lenta, id_usu) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $fecha, $deporte, $lenta, $id_usu);
    $stmt->execute();
    echo "Registro guardado.";
}
?>

<form method="POST">
    Fecha: <input type="date" name="fecha" required><br>
    Deporte: <input type="number" name="deporte" required><br>
    Insulina Lenta: <input type="number" name="lenta" required><br>
    <button type="submit">Guardar</button>
</form>
