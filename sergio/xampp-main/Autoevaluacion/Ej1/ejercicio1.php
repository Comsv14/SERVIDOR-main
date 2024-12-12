<?php
    /*
        Crear un formulario que contenga una matriz de 2x3 y un botón de calcular como se puede ver en la figura. 
        Para crear el formulario se han de utilizar bucles, el formulario solo ha de contener una etiqueta, una caja de texto y un botón. 
        El ejercicio se resolverá en un único fichero llamado ejercicio1.php, en la primera ejecución se mostrará el formulario y en la recarga una vez pulsado
         el botón se mostrará el resultado.
    */

    


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <?php
        if (!isset($_POST["00"])) {
            for ($i = 0; $i<3; $i++){
                for ($j = 0; $j<2; $j++){
                    
                    echo "<label for='$i$j'>E($i,$j)</label>  <input type='number' name='$i$j' min='1' max='100'  required>";
                    
                }
                echo "<br><br>";
            }

            echo "<input type='submit' value='Calcular'>";
        } else {
            for ($i = 0; $i<3; $i++) {
                for ($j = 0; $j<2; $j++){
                    
                    $tempnum = $_POST["$i$j"];
                    $tempbin = decbin($tempnum);
                    
                    echo "$tempnum = $tempbin <br>";
                    
                    
                }

            }
        }
        ?>
    </form>
</body>
</html>
