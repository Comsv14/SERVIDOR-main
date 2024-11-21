<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el Número</title>
</head>
<body>
    <form action="#" method="post">
        <?php
        session_start();
        if (!isset($_SESSION['numero'])) {
            $_SESSION['numero'] = rand(1, 100);
        }

        if (!isset($_SESSION['cont'])) {
            $_SESSION['cont'] = 0;
        }

        if (isset($_POST['submit'])) {
            $numero_aleatorio = $_SESSION['numero'];
            $tu_num = $_POST['valor'];  
            $_SESSION['cont']++;  
            echo '<p>Tu número es: ' . $tu_num . '</p>';

            if ($numero_aleatorio == $tu_num) {
                echo 'ENHORABUENA, HAS ACERTADO';
                echo '<p>Has necesitado ' . $_SESSION['cont'] . ' intentos.</p>';
                echo '<a href="EJERCICIO3.php"> Volver a jugar </a>';
                
                session_destroy();
            } else {
                if ($numero_aleatorio > $tu_num) {
                    echo '<p>MI NUMERO ES MAYOR</p>';
                } else {
                    echo '<p>MI NUMERO ES MENOR</p>';
                }
                echo '<a href="EJERCICIO3.php">Sigue jugando...</a>';
            }
        } else {
            
            echo '<label for="numero">Adivina mi número:</label>';
            echo '<input type="text" id="numero" name="valor">';
            echo '<br>';
            echo '<button class="button" name="submit" type="submit">Enviar</button>';
        }
        ?>
    </form>
</body>
</html>
