<?php
session_start();
require_once('autenticacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $clave = $_POST["clave"];

    if (autenticarUsuario($login, $clave)) {
        // Usuario autenticado, establecer la sesión y redirigir a la página principal
        $_SESSION["login"] = $login;
        header("Location: mostrarcartas.php");
        exit();
    } else {
        // Usuario no autenticado, mostrar mensaje de error
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}

//LLENAR LAS POSICIONES
function llenar() {
    $posicion = [1, 2, 3, 4, 5, 6];  
    $valores = [2, 2, 3, 3, 5, 5];  
    
    shuffle($valores);  // Mezcla los valores aleatoriamente
    
    // Asigna los valores mezclados al array $posicion
    for ($i = 0; $i < count($posicion); $i++) {
        $posicion[$i] = $valores[$i];
    }

    return $posicion;  // Devuelve el array modificado
}

$posicion = llenar();  // Llama a la función y guarda el resultado
$_SESSION["posiciones"]=$posicion;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h2>Iniciar sesión</h2>

    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Usuario:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
