<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Color Aleatorio</title>
    <style>
        /* Estilos para el círculo */
        .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
            margin: 20px auto;
        }
        /* Estilos del botón */
        .button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
session_start();
// Lista de colores
$colors = ['red', 'blue', 'green', 'yellow'];

for ($i=0; $i <4 ; $i++) { 
    // Selección aleatoria de un color
    $randomColor[$i] = $colors[array_rand($colors)];
?>
    <div class="circle" style="background-color: <?php echo $randomColor[$i]; ?>;">
        <?php echo ucfirst($randomColor[$i]); /*Primera letra en mayuscula*/?> 
    </div>
<?php 
}
    // Guardar el array en una variable de sesión
    $_SESSION['colores_adivinar'] = $randomColor;
    $_SESSION['colores'] = $colors;
?>

<!-- Formulario para recargar la página y generar un nuevo color -->
<form action="pregunta.php" method="POST">
    <button class="button" name="boton" type="submit">Enviar</button>
</form>
</body>
</html>