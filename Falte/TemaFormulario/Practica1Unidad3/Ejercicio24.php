<?php
/*Crea un array llamado deportes e introduce los siguientes valores: 
futbol, baloncesto, natación, tenis. 
Haz el recorrido de la matriz con un for para mostrar 
sus valores. A continuación realiza las siguientes operaciones 
- Muestra el total de valores que contiene. 
- Sitúa  el  puntero  en  el  primer  elemento  del  array  y  muestra  el  valor  actual,  es 
decir, donde está situado el puntero actualmente. 
- Avanza una posición y muestra el valor actual. 
- Coloca el puntero en la última posición y muestra su valor. 
- Retrocede una posición y muestra este valor.
*/
$deportes=array(
    'futbol',
    'baloncesto',
    'natación',
    'tenis'
);
for ($i=0; $i <4 ; $i++) { 
    echo $deportes[$i], " ";
}
echo"</br>";
//- Muestra el total de valores que contiene.
$valores=count($deportes);
echo "Numero de valores del array(deportes): ", $valores, "</br>";
//-Sitúa el puntero en el primer elemento del array y muestra el valor actual
echo "Primer valor (puntero al inicio): ", current($deportes), "</br>";
//-Avanza una posición y muestra el valor actual
next($deportes);
echo "Valor actual después de avanzar una posición: ", current($deportes), "</br>";
//-Coloca el puntero en la última posición y muestra su valor
end($deportes);
echo "Valor actual en la última posición: ", current($deportes), "</br>";
//-Retrocede una posición y muestra este valor
prev($deportes);
echo "Valor actual después de retroceder una posición: ", current($deportes), "</br>";
?>