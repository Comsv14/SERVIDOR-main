<?php
include 'Operaciones.php';
// Crear una objeto de clase Operaciones
$operar = new Operaciones(50, 20);

// Esta línea crea un nuevo objeto llamado "operar" de la clase "Operaciones". 
// Le pasamos los valores 50 y 20 como argumentos al constructor de la clase.

// Mostrar el objeto operar, usa el método __toString()
//echo $operar->__toString();
echo $operar . "<br>";

// Esta línea intenta mostrar el objeto "operar" directamente. 
// Para que esto funcione, la clase "Operaciones" debe tener un método __toString() 
// que defina cómo se representa el objeto como una cadena de texto.

// Mostrar operaciones básicas usando los métodos suma, resta, multiplicación y división
echo $operar->suma() . "<br>";
echo $operar->resta() . "<br>";
echo $operar->multiplicacion() . "<br>";
echo $operar->division() . "<br>";

// Estas líneas llaman a los métodos suma, resta, multiplicación y división 
// del objeto "operar" y muestran el resultado en pantalla. 
// Para que esto funcione, la clase "Operaciones" debe tener estos métodos definidos.
?>