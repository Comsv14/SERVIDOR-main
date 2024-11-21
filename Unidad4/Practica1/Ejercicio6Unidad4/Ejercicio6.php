<?php
/*
    Se  ha  de  crear  un  formulario  con  una  caja  de  texto  y  un  botón  ACEPTAR,
    según  el valor  introducido  en  la  caja  de  texto  se  han  de  mostrar  los  elementos  indicados
    ,a partir  de  ahí  la  web  se  ha  de  comportar  igual  que  el  ejercicio  anterior,  se  ha  de 
    resolver con un sólo script 
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6Unidad4</title>
</head>
<body>
<?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        // Inicializamos el array de datos
        $datos_formulario = array();
        //recibir numero de elemento de un input oculto
        $numero_de_elementos2=$_POST['numero_de_elementos'];
        // Llenar el array con los datos del formulario y calcular la suma
        $suma = 0;
        for ($i = 0; $i <$numero_de_elementos2; $i++) {
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
        //Cambios
        echo'<form action="Ejercicio6Unidad4.php" method="post">';
        echo '
            <label for="nombre">Numero de Elementos:</label>
                <input type="text" id="numero" name="numero"><br>';
                echo '<input type="submit" name="Aceptar" value="Aceptar">';
        echo'</form>';
        if(isset($_POST['Aceptar'])){
            $numero_de_elementos=$_POST['numero'];  
        //
            echo '<form action="Ejercicio6Unidad4.php" method="post">';
            for ($i = 0; $i < $numero_de_elementos; $i++) { 
                echo '
                    <label for="nombre">'.($i+1).':</label>
                    <input type="text" id="'.$i.'" name="'.$i.'"><br>';

            }
            echo '<input type="submit" name="submit" value="Enviar">';
            echo '</form>';
        }
    }else{
        //Cambios
        echo'<form action="Ejercicio6Unidad4.php" method="post">';
        echo '
            <label for="nombre">Numero de Elementos:</label>
                <input type="text" id="numero" name="numero"><br>';
                echo '<input type="submit" name="Aceptar" value="Aceptar">';
        echo'</form>';
        if(isset($_POST['Aceptar'])){
            $numero_de_elementos=$_POST['numero'];  
        //
            echo '<form action="Ejercicio6Unidad4.php" method="post">';
            for ($i = 0; $i < $numero_de_elementos; $i++) { 
                echo '
                    <label for="nombre">'.($i+1).':</label>
                    <input type="text" id="'.$i.'" name="'.$i.'"><br>';
            }
             // Enviar el número de elementos también como un campo oculto
            echo '<input type="hidden" name="numero_de_elementos" value="'.$numero_de_elementos.'">';
            echo '<input type="submit" name="submit" value="Enviar">';
            echo '</form>';
        }
    }
?>
</body>
</html>