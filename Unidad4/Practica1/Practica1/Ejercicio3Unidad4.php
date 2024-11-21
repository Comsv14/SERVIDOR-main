<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>   
    </head>
    <body>
    <?php
                    /*
                        Construir una calculadora, se ha de resolver con un script, en la primera ejecución se 
                        ha  de  mostrar  el  formulario  únicamente  y  en  las  posteriores,  el  resultado  y  el 
                        formulario con los valores guardados. Al pulsar uno de los cuatro botones se 
                        mostrará la operación solicitada de los valores introducidos en las cajas de texto
                    */
                    
            if(isset($_POST['num1']) && isset($_POST['num2'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];

                if(isset($_POST['suma'])) {
                    $resultado = $num1 + $num2;
                    echo "La suma de ".$num1." + ".$num2. " = ".$resultado."<br>";
                } elseif(isset($_POST['resta'])) {
                    $resultado = $num1 - $num2;
                    echo "La resta de ".$num1." - ".$num2. " = ".$resultado."<br>";
                } elseif(isset($_POST['multiplicacion'])) {
                    $resultado = $num1 * $num2;
                    echo "La multiplicación de ".$num1." * ".$num2. " = ".$resultado."<br>";
                } elseif(isset($_POST['division'])) {
                    if($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo "La división de ".$num1." / ".$num2. " = ".$resultado."<br>";
                    } else {
                    echo "Error: No se puede dividir por cero";
                    }
                }
                echo "<h2>Formulario</h2>";
                echo "<form action='Ejercicio3Unidad4.php' method='post'>
                <label for='nombre'>A:</label><br>
                <input type='text' id='num1' name='num1' required><br><br>

                <label for='apellidos'>B:</label><br>
                <input type='text' id='num2' name='num2' required><br><br>

                <input type='submit' name='suma' value='Suma'>
                <input type='submit' name='resta' value='Resta'>
                <input type='submit' name='multiplicacion' value='Multiplicación'>
                <input type='submit' name='division' value='División'>
                </form>";
                } else {
                echo "<h2>Formulario</h2>";
                echo "<form action='Ejercicio3Unidad4.php' method='post'>
                <label for='nombre'>A:</label><br>
                <input type='text' id='num1' name='num1' required><br><br>

                <label for='apellidos'>B:</label><br>
                <input type='text' id='num2' name='num2' required><br><br>

                <input type='submit' name='suma' value='Suma'>
                <input type='submit' name='resta' value='Resta'>
                <input type='submit' name='multiplicacion' value='Multiplicación'>
                <input type='submit' name='division' value='División'>
                </form>";
            }
        ?>
    </body>
    </html>