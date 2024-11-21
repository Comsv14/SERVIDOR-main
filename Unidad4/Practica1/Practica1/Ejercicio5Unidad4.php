<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con bucle y suma</title>
</head>
<body>
<?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        
        // Inicializamos el array de datos
        $datos_formulario = array();

        // Llenar el array con los datos del formulario y calcular la suma
        $suma = 0;
        for ($i = 0; $i <= 8; $i++) {
            // Guardamos cada valor en el array, si no se ingresó nada lo dejamos como 0
            //$valor = isset($_POST[$i]) ? (int)$_POST[$i] : 0;
            $valor = $_POST[$i];
            $datos_formulario[] = $valor;
            // Sumamos el valor
            $suma += $valor;
        }
        $numero_de_elementos=count($datos_formulario);
        echo "el vector tiene ".count($datos_formulario)." elementos </br>";

        // Mostrar los valores del formulario y la suma
        foreach ($datos_formulario as $key => $value) {
            echo $key." = ". $value."</br>";
        }
        echo "<br>la suma es $suma<br>";
        // Repetir form
        echo '<form action="Ejercicio5Unidad4.php" method="post">';
        for ($i = 0; $i <= 8; $i++) { 
            echo '
                <label for="nombre">'.$i.':</label>
                <input type="text" id="'.$i.'" name="'.$i.'"><br>';
        }
        echo '<input type="submit" name="submit" value="Enviar">';
        echo '</form>';
    }else{
        echo '<form action="Ejercicio5Unidad4.php" method="post">';
        for ($i = 0; $i <= 8; $i++) { 
            echo '
                <label for="nombre">'.$i.':</label>
                <input type="text" id="'.$i.'" name="'.$i.'"><br>';
        }
        echo '<input type="submit" name="submit" value="Enviar">';
        echo '</form>';
    }
?>
</body>
</html>