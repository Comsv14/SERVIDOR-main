<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die("Fatal Error");

 $query = "DELETE FROM `usuarios` WHERE `usu` = 'lucas';";
 $result = $conn->query($query);
 if (!$result) 
 die("Fatal Error");
else {
    echo 'Se ha eliminado correctamente.';
}
$conn->close();    
?> 