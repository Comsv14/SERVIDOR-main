<?php
session_start();
if (!isset($_SESSION['result'])) {
    $_SESSION['result'] = rand(1,100);
    $_SESSION['intentos'] = 0;
}
function comprobar() {
    if (isset($_POST['resp'])) {
        $resp = $_POST['resp'];
        $intentos = $_SESSION['intentos'];
        if ($_POST['resp'] != $_SESSION['result']) {
            
            echo "<p>Tu numero es: $resp</p><br>";
            if ($_POST['resp']>$_SESSION['result']) {
                echo "Mi número es MENOR";
            } else {
                echo "Mi número es MAYOR";
            }
            $_SESSION['intentos']++;
            echo "<br><a href='ejercicio3.php'>Sigue jugando...</a>";
        } else {
            echo<<<_END
                <p>Tu numero es: $resp</p><br>
                <p>ENHORABUENA, HAS ACERTADO</p>
                <p>Has necesitado $intentos intentos</p>
                <br><a href='ejercicio3.php'>Sigue jugando...</a>
            _END;
            
            session_destroy();
        }
    } else {
        echo<<<_END
            <label for="resp">Adivina mi número: </label>
            
            <input type="number" name="resp" required>
            <br>
            <input type='submit' value='Enviar'>
        _END;
    }
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <?php comprobar();?>
        
    </form>
</body>
</html>