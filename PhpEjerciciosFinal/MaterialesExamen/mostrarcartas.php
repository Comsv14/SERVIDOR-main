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

   <form method="post" action="#">
    <label>Cartas levantadas</label>
    <input type="number" id="cLevantada" name="clevantada" disabled><br><br>
    <input type="submit" value="Levantar carta 1" name="submit" data-id="1">
    <input type="submit" value="Levantar carta 2" name="submit" data-id="2">
    <input type="submit" value="Levantar carta 3" name="submit" data-id="3">
    <input type="submit" value="Levantar carta 4" name="submit" data-id="4">
    <input type="submit" value="Levantar carta 5" name="submit" data-id="5">
    <input type="submit" value="Levantar carta 6" name="submit" data-id="6"><br><br>
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
    <div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $seleccion = $_POST['submit']; // Obtén el valor del botón presionado

    if (isset($_SESSION["posiciones"])) {
        // Verifica si existe la carta seleccionada en las posiciones
        $indice = $seleccion - 1; // Convertir a índice (porque los arrays son base 0)
        if (isset($_SESSION["posiciones"][$indice])) {
            $valor = $_SESSION["posiciones"][$indice]; // Obtén el valor de la carta en esa posición

            // Mostrar la carta según su valor
            if ($valor == 2) {
                echo '<img src="copas_02.jpg" alt="Dos">';
            } elseif ($valor == 3) {
                echo '<img src="copas_03.jpg" alt="Tres">';
            } elseif ($valor == 5) {
                echo '<img src="copas_05.jpg" alt="Cinco">';
            } 
        } 
    } 
}
?>
    </div>
</body>
</html>
