<?php
include_once 'Coche.php';
include_once 'Camion.php';
include_once 'Dos_Ruedas.php';

// Crear un coche
$coche1 = new Coche('Verde', 1400, 4); // Color, peso, número de puertas
echo '-------------------------------------------------'. '<br>';
echo 'El color del coche es: '.$coche1->getColor(). '<br>';
echo 'El peso del coche es: '.$coche1->getPeso(). '<br>';
echo '-------------------------------------------------'. '<br>';

// Añadimos personas
echo 'Se sube un pasajero que pesa 65kg.'.'<br>';
echo 'Se sube un pasajero que pesa 65kg.'.'<br>';
$coche1->aniadirPersona(65);
$coche1->aniadirPersona(65);

// Mostramos el estado del coche
echo '-------------------------------------------------'. '<br>';

// Repintar el coche
$coche1->repintar('Rojo');
echo 'Después de repintar:'.'<br>';
echo $coche1 . '<br>'; // Muestra el estado del coche
echo '-------------------------------------------------'. '<br>';

// Añadir cadenas de nieve
$coche1->aniadir_cadenas_nieve(2);
echo 'Ponemos 2 cadenas de nieve.'.'<br>';
echo 'El coche ahora tiene '.$coche1->getNumero_cadenas_nieve().' cadenas de nieve.'.'<br>';

// Quitamos cadenas de nieve
$coche1->quitar_cadenas_nieve(1);
echo 'Quitamos 1 cadena de nieve.'.'<br>';
echo 'El coche ahora tiene '.$coche1->getNumero_cadenas_nieve(). ' cadenas de nieve.'. '<br>';

// Creamos el objeto dos ruedas negro
echo '-------------------------------------------------'. '<br>';
$moto1 = new Dos_Ruedas('Negro', 120);
echo $moto1 . '<br>'; // Muestra el estado de la moto
echo '-------------------------------------------------'. '<br>';
echo 'Se sube un pasajero que pesa 80kg.'.'<br>';
$moto1->aniadirPersona(80);
echo 'Pongo 20 litros de gasolina'.'<br>';
$moto1->poner_gasolina(20);
echo $moto1 . '<br>'; // Muestra el estado de la moto
echo '-------------------------------------------------'. '<br>';

$camion1 = new Camion('Azul', 10000, 2, 10);
echo $camion1 . '<br>'; // Muestra el estado del camión
echo '-------------------------------------------------'. '<br>';   
echo 'Se pone un remolque que mide 5 metros.'.'<br>';
$camion1->aniadir_remolque(5);
echo 'Se sube un pasajero que pesa 80kg.'.'<br>';
$camion1->aniadirPersona(80);
echo $camion1 . '<br>'; // Muestra el estado del camión despues de aniadir a una persona de 80 kilos
?>
