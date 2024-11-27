<?php
// query-mysqli.php
require_once 'login.php';
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");

$query = "SELECT usu, contra FROM usuarios";
$result = $connection->query($query);
if (!$result) die("Fatal Error");

$rows = $result->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_assoc(); // Usar una variable diferente
    echo 'Usuario: ' . htmlspecialchars($row['usu']) . '<br>';
    echo 'Contrasenia: ' . htmlspecialchars($row['contra']) . '<br><br>';
}

$result->close();
$connection->close();
?>
