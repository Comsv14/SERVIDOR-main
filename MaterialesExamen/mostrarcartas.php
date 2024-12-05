<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cartas</title>
</head>
<body>
   <h1> Bienvenid@ <?php echo $_SESSION["login"]; ?></h1>

    <form type="post" action="#">
    <label>Cartas levantadas</label>
    <input type="number" id="cLevantada" name="clevnatada" disabled><br></br>
    <input type="submit" value="Levantar carta 1" name="lev">
    <input type="submit" value="Levantar carta 2" name="lev">
    <input type="submit" value="Levantar carta 3" name="lev">
    <input type="submit" value="Levantar carta 4" name="lev">
    <input type="submit" value="Levantar carta 5" name="lev">
    <input type="submit" value="Levantar carta 6" name="lev"><br></br>
    <h1>Pareja: </h1>


    </form>
    
    <div>
        <?php
        // Recorre el array $posicion y muestra las imágenes negras 
        echo '<p>';
        foreach ($_SESSION["posiciones"] as $valor) {
            echo '<img src="boca_abajo.jpg" alt="Negro" width="150" height="200"> ';
        }
        echo '</p>';
        ?>
    </div>
</body>
</html>
