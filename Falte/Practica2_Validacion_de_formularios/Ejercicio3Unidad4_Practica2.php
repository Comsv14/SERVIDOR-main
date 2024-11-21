<?php
/*
    ¿Qué acción realizará la siguiente línea de código html? 
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">


    cuando el usuario envíe el formulario, los datos se enviarán al mismo script PHP que está 
    siendo ejecutado, y no a un script diferente. 
    Esto permite que el script PHP actual pueda procesar los datos enviados
    y realizar acciones en consecuencia.
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        
       </form>'
    ?>
    </body>
</html>