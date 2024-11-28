<?php
require_once 'login.php';    
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!empty($_POST['usu']) && !empty($_POST['contra'])) {
    $input_usuario = $_POST['usu']; 
    $input_password = $_POST['contra']; 
    $query = "SELECT usu, contra FROM usuarios WHERE usu = '$input_usuario' AND contra = '$input_password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo '<div style="text-align: center;">'; 
        echo "Inicio de sesión exitoso. <br>";
        $row = $result->fetch_assoc(); 
        echo '<strong>Usuario: </strong>' . htmlspecialchars($row['usu']) . '. <br>';
        echo '<strong>Contraseña: </strong>' . htmlspecialchars($row['contra']) . '. <br></br>';
        echo '<a href="loginusu.html">Volver</a>';
        echo '</div>'; 
    } else {
        echo '<div style="text-align: center;">';
        echo "Usuario o contraseña incorrectos.";
        echo '</div>';
    }
}
$conn->close();
?>
