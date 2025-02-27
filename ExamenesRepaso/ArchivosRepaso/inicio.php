<?php
session_start(); // Inicia la sesión para mantener las variables entre peticiones

// Si la variable de sesión 'contador' no está definida, se inicializa en 0
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Comprueba si el formulario ha sido enviado
if (isset($_POST['input'])) {
    // Si se presiona "INCREMENTAR" y el contador es menor que 4, lo incrementa
    if ($_POST['input'] == "INCREMENTAR" && $_SESSION['contador'] < 4) {
        $_SESSION['contador']++;
    } 
    // Si se presiona "DISMINUIR" y el contador es mayor que 0, lo decrementa
    elseif ($_POST['input'] == "DISMINUIR" && $_SESSION['contador'] > 0) {
        $_SESSION['contador']--;
    } 
    // Si se presiona "GRABAR", redirige a agenda.php usando la metaetiqueta en lugar de header()
    elseif ($_POST['input'] == "GRABAR") {
        header("Location: agenda.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>AGENDA</h1>
    <div style="border: 4px double; width:40%;">
        <!-- Muestra el nombre del usuario almacenado en la sesión -->
        <p>Hola <?php echo $_SESSION['usu']; ?>, ¿cuántos contactos deseas grabar?</p>
        <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</p>
        <p>Cuando el número sea el deseado pulsa GRABAR</p>
    </div>
    <div>
        <?php 
            // Muestra imágenes según el valor de $_SESSION['contador']
            for ($i = 0; $i <= $_SESSION['contador']; $i++) {
                echo "<img src='img/OIP$i.jfif' style='border: 4px double; width:5%;'>";
            }
        ?>
    </div>
    <!-- Formulario con botones para modificar el contador y grabar los datos -->
    <form method="post" action="#">
        <input type="submit" value="INCREMENTAR" name="input">
        <input type="submit" value="DISMINUIR" name="input">
        <input type="submit" value="GRABAR" name="input">
    </form>
</body>
</html>
