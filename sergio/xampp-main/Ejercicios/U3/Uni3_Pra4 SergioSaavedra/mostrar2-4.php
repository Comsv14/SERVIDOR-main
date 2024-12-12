<?php
    require_once 'ej2-4.php';
    

    /*
        Realice las siguientes operaciones (continuación del ejercicio anterior, dificultad
        fácil):
             Cree los accesos de todos los atributos.
             Cree un constructor en la clase vehículo que tome como argumento el
            color y el peso.
             Cree el método _toString de la clase vehículo para que muestre
            información respecto al objeto.
             Modifique el método circula() para que muestre "El vehículo circula".
             Modifique el método añadir_persona(peso_persona) para que cambie el
            peso del vehículo en función del peso de la persona que pasa como
            argumento.
             Cree la página mostrar.php y un vehículo negro de 1500 kg y muestre
            información sobre el vehículo.
             Haga que circule. Añada una persona de 70 kg y muestre el nuevo peso
            del vehículo.
    */

     
    $vehiculo = new Vehiculo("negro",1500);
    echo "-------ej3-------<br>";
    echo $vehiculo;
    echo $vehiculo->circula();
    echo $vehiculo->añadir_persona(70);
    echo $vehiculo;
    

    echo "<br>-------ej4-------<br>";

    //ej4 En la página mostrar.php, cree un coche verde de 1400 kg. Añada dos personas de 65 kg cada una. Muestre su color y su nuevo peso.

    $coche = new Coche("verde", 1400);
    $coche->añadir_persona(65);
    $coche->añadir_persona(65);
    echo "El color del coche es: ",$coche->getColor(),"<br>";
    echo "El nuevo peso del coche: ",$coche->getPeso(),"<br>";

    //ej4 Retome el coche en rojo y añada dos cadenas para la nieve.

    $coche->repintar("rojo");
    $coche->añadir_cadenas_nieve(2);
    

    //ej4 Muestre su color y su número de cadenas para la nieve.

    echo "El color del coche es: ",$coche->getColor(),"<br>";
    echo "El numero de cadenas para la nieve del coche es: ",$coche->getNumero_cadenas_nieve(),"<br>";
    echo "<br>";
    //ej4 Cree un objeto Dos_ruedas negro de 120 kg. Añada una persona de 80 kg. Ponga 20 litros de gasolina.

    $dos_ruedas = new Dos_ruedas("negro",120);
    $dos_ruedas->añadir_persona(80);
    $dos_ruedas->poner_gasolina(20);

    //ej4 Muestre el color y el peso de dos ruedas

    echo "El color del dos ruedas es: ",$dos_ruedas->getColor(),"<br>";
    echo "El peso del dos ruedas es: ",$dos_ruedas->getPeso(),"<br>";
    echo "<br>";

    //ej4 Cree un camión azul de 10000 kg y de 10 metros de longitud con 2 puertas. Añada un remolque de 5 metros y una persona de 80 kg
    $camion = new Camion("azul",10000,10,2);
    $camion->añadir_remolque(5);
    $camion->añadir_persona(80);

    echo "El color del camion es: ",$camion->getColor(),"<br>";
    echo "El peso del camion es: ",$camion->getPeso(),"<br>";
    echo "La longitud del camion es: ",$camion->getLongitud(),"<br>";
    echo "El numero de puertas de camion es: ",$camion->getNumero_puertas(),"<br>";
    echo "<br>";

    


?>