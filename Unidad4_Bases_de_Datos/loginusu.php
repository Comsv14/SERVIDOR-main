<?php
$servername = "localhost";
$username = "Jugador";        
$password = "jugador";            
$dbname = "bdsimon";      

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!empty($_POST['usu']) && !empty($_POST['contra'])) {
    $input_usuario = $_POST['usu']; 
    $input_password = $_POST['contra']; 
    $query = "SELECT  usu, contra FROM usuarios WHERE usu = '$input_usuario' AND contra = '$input_password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo "Inicio de sesión exitoso. <br>";
        $row = $result->fetch_assoc(); 
        echo '<strong>Usuario: </strong>' . htmlspecialchars($row['usu']) . '. <br>';
        echo '<strong>Contraseña: </strong>' . htmlspecialchars($row['contra']) . '. <br></br>';
        echo '<a href="loginusu.html">Volver</a>';
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Por favor ingresa tu usuario y contraseña.";
}

$conn->close();
?>

