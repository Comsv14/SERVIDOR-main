<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*meter dato en el formulario de la dimension y boton de eviar
        funcion suma_elementos(array) sumar los elementos de 
        la diagonal principal y los de la diagonal secundaria*/

            echo '<form action="mostrarArray.php" method="post">';
                echo '
                <label for="nombre">'.'Dimension: '.':</label>
                <input type="text" id="dimension" name="dimension"><br>';

            echo '<input type="submit" name="submit" value="Pintar">';
            echo '</form>';
    ?> 
</body>
</html>