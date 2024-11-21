<?php
if (isset($_POST['nombre']) && isset($_POST['apellidos'])){
        echo 'Nombre: ' .$_POST['nombre'].'<br>';
        echo 'Apellidos: ' .$_POST['apellidos'].'<br>';
        var_dump($_POST);
    /*
    echo $_POST['nombre'];
    echo "<br>";
    echo $_POST['apellidos'];
    */
    }
    else{
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
    <form action="#" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" ><br><br>
        
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" ><br><br>
        
        <input type="submit" value="Enviar">
    
    </form>
</body>
</html>
<?php    
}
?>
