<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
     <style>
        /* Reseteo básico de márgenes y padding para el body y html */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Contenedor que envuelve todo el contenido del formulario */
        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los títulos */
        h1 {
            font-family: Arial Black;
            font-weight: bold;
            font-size: 30px;
            color: #333;
            text-shadow: 0 1px 0 #ddd, 0 2px 0 #ccc, 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 0 #acacac, 0 6px 1px rgba(0,0,0,0.1), 0 0 5px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.3), 0 3px 5px rgba(0,0,0,0.2), 0 5px 10px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.2), 0 20px 20px rgba(0,0,0,0.15);
        }

        /* Estilos para el mensaje de error */
        p.err {
            color: red;
        }

        /* Estilo para los botones */
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Estilo de los enlaces */
        a {
            color: #20bf6b !important;
            text-transform: uppercase;
            background: #ffffff;
            padding: 20px;
            border: 4px solid #20bf6b !important;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        a:hover {
            color: #494949 !important;
            border-radius: 50px;
            border-color: #494949 !important;
            transition: all 0.3s ease 0s;
        }
    </style> 
</head>
<body>
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
        echo '<div class="container">'; 
        echo "<h1>Inicio de sesión exitoso.</h1> <br>";
        $row = $result->fetch_assoc(); 
        echo '<strong>Usuario: </strong>' . htmlspecialchars($row['usu']) . '. <br>';
        echo '<strong>Contraseña: </strong>' . htmlspecialchars($row['contra']) . '. <br></br>';
        echo '<a href="iniciarsesion.php">Volver</a>';
        echo '</div>'; 
        exit;
    } else {
        echo '<div class="container">';
        echo '<p class="err">Usuario o contraseña incorrectos.</p>';
        echo '</div>';
    }
}
$conn->close();
?>

<div class="container">
    <h1>Inicio de Sesion</h1>
    <form method="post" action="#">
        <label for="usu">Usuario:</label>
        <input type="text" id="usu" name="usu" required>
        <br><br>
        <label for="contra">Password:</label>
        <input type="password" id="contra" name="contra" required>
        <br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</div>

</body>
</html>
