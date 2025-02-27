<?php
session_start(); // Inicia la sesión para poder usar variables de sesión

// Comprueba si se ha enviado un formulario con el campo 'input'
if (isset($_POST['input'])) {
    // Si se presiona "INCREMENTAR" y el contador es menor que 4, se incrementa
    if ($_POST['input'] == "INCREMENTAR" && $_SESSION['contador'] < 4) {
        $_SESSION['contador']++;
    } 
    // Si el contador es 4 o más, redirige a agenda.php
    elseif ($_SESSION['contador'] >= 4) {
        header("Location: agenda.php");
        exit(); // Se usa exit() para detener la ejecución después de la redirección
    } 
    // En cualquier otro caso, también redirige a agenda.php
    else {
        header("Location: agenda.php");
        exit();
    }
} 
// Si no se ha enviado ningún formulario, inicializa el contador en 0
else {
    $_SESSION['contador'] = 0;
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
        <p>Hola <?php echo  $_SESSION['usu'];?>, cuantos contactos deseas grabar?</p>
        <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</p>
        <p>Cuando el número sea el deseado pulsa GRABAR</p>
    </div>
    <div>
        <?php 
            for ($i=0;$i<=$_SESSION['contador']; $i++) {
                echo "<img src='img/OIP$i.jfif' style='border: 4px double; width:5%;'>";
            }
        ?>
    </div>
    <form method="post" action="#">
    <input type="submit" value="INCREMENTAR" name="input">
    <input type="submit" value="GRABAR" name="input">
    </form>
</body>
</html>