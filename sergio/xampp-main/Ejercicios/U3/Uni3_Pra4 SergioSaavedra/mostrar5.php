<?php
    require_once 'ej5.php';

    //ej5 En la página mostrar.php cree un dos ruedas rojo de 150 kg.
    $dos_ruedas = new Dos_ruedas("rojo",150);
    //ej5 Añada una persona de 70 kg y muestre su peso total.
    $dos_ruedas->añadir_persona(70);
    echo "El peso del dos ruedas es: ".$dos_ruedas->getPeso();
    //ej5 Cambie a verde el color de dos ruedas. Incluya una cilindrada de 1000.
    $dos_ruedas->setColor("verde");
    $dos_ruedas->setCilindrada(1000);
    echo "<br><br>";
    //ej5 Muestre todos los valores de los atributos de dos ruedas con la función ver_atributo.
    $dos_ruedas->ver_atributo($dos_ruedas);

    //ej5 Cree un camión blanco de 6000 kg
    $camion = new Camion("blanco",6000);

    //ej5 Añada una persona de 84 kg. Vuelva a pintarlo, en color azul. Incluya 2 puertas.
    $camion->añadir_persona(84);
    $camion->repintar("azul");
    $camion->setNumero_puertas(2);

    //ej5 Muestre todos los valores de los atributos del camión con la función ver_atributo.
    echo "<br><br>";
    $camion->ver_atributo($camion);
?>