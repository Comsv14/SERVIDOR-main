<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Círculo con Color Aleatorio y Botón de Submit</title>
    <style>
        /* Estilos para el círculo */
        .circle {
            width: 100px;              /* Ancho del círculo */
            height: 100px;             /* Alto del círculo */
            border-radius: 50%;        /* Hace que sea circular */
            margin: 20px auto;         /* Centra el círculo en la página */
        }

        /* Estilos para el botón */
        .button {
            display: block;
            width: 100px;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50; /* Color del botón */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<?php
// Array de colores disponibles
$colores = ["red", "green", "blue", "yellow"];
// Selección de color aleatorio
$colorAleatorio = $colores[array_rand($colores)];
?>

<!-- Formulario con círculo y botón de submit -->
<form method="post" action="">
    <!-- Círculo con color aleatorio -->
    <div class="circle" style="background-color: <?= $colorAleatorio; ?>;"></div>
    <!-- Botón de submit -->
    <button type="submit" class="button">Enviar</button>
</form>

<?php
// Procesar el formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<p>Formulario enviado con éxito.</p>";
}
?>

</body>
</html>



