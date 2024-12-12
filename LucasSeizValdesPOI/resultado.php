<?php
session_start();
/*require_once 'login.php';
$login = $_SESSION['login'];
$connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");
    $query = "SELECT login ,hora, respuesta WHERE fecha='2024-12-12'";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    
    $connection->close();
    $_SESSION['respuesta'] = htmlspecialchars($result->fetch_assoc()['respuesta']);
    $query = "INSERT INTO respuestas WHERE login='$login'";
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    
    ?>
</head>
<body>
    <h1>FECHA: <?php
    echo date('o-m-d');
    ?></h1>
    
</body>
</html>