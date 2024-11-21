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
            display: inline;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            /* background-color: ; */
        }
    </style>
</head>
<body>
<?php
session_start(); // Inicia la sesión
//creacionde la funcion de 4 circulos de color negro
$negro = 'black';
function crearCirculo($negro){
    echo '<div class="circle" style="background-color:'.$negro.';">'.$negro.'</div>';
}
// Verificar si el array está disponible en la sesión
if (isset($_SESSION['colores_adivinar'])) {
    $colorAdivinar= $_SESSION['colores_adivinar'] ;
}
    //const negro ="black";
    foreach ($colorAdivinar as $key => $value) {
        crearCirculo($negro);
        //echo" key: ".$key." value: ".$value ;       
    }
//preguntar al usuario por los colores a adivinar
echo '<form action="respuesta.php" method="POST">';
    
$colores= $_SESSION['colores'] ;
// Crear un botón para cada color y que el boton sea del color correspondiente
foreach ($colores as $key => $value) { 
    echo '<button class="button" name="'.$key.'" type="">'.$value.'</button>';
}

echo '<br><br> <input type="submit" value="Enviar">';
echo '</form>';
?>
</body>
</html>