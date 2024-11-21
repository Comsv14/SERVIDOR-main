<?php
include_once 'Coche.php';
include_once 'Camion.php';
include_once 'Dos_Ruedas.php';
include_once 'Cuatro_Ruedas.php';
echo '-------------------------MOTO-------------------------'. '<br>';
// Crear un dos ruedas rojo de 150 kg
$moto = new Dos_Ruedas('Rojo', 150); 
// Veo todos los atributos con el ver_Atributo
$moto->ver_Atributo($moto).'<br>';
// Aniado una persona de 70 kilos para ver que aniada 72 kg por el casco
echo 'Se sube una persona de 70 kilos con un casco de 2 kilos'. '<br>';
$moto->aniadirPersona(70);
// Mostrar la moto con sus atributos
echo $moto.'<br>';
echo 'Repinto la moto de color verde y aniado su cilindrada de 1000cc'. '<br>';
$moto->repintar('Verde');
// Repintar la moto a verde y aniadir 1000cc
$moto->setCilindrada(1000);
$moto->ver_Atributo($moto).'<br>';
// Aniadir un camion blanco de 6000 kg con 2 puertas
echo '-------------------------CAMION-------------------------'. '<br>';
$camion = new Camion('Blanco', 6000, 2);
// Aniado una persona de 84 kilos
echo 'Se sube una persona de 84 kilos'. '<br>';
$camion-> aniadirPersona(84);
// Lo repinto de color azul y veo sus atributos
echo 'Repinto el camion de color azul'. '<br>';
$camion->repintar('Azul');
$camion->ver_Atributo($camion); 


?>
