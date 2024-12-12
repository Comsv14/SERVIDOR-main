<?php
    //ej5 Convierta en abstractos la clase Vehículo y su método añadir_persona(peso_persona).
    abstract class Vehiculo {
        protected $color;
        protected $peso;

        

        public function getColor() {
            return $this->color;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function setColor($valor) {
            $this->color = $valor;
        }

        public function setPeso($valor) {
            $this->peso = $valor;
        }

        public function circula() {
            return "El vehiculo circula <br>";
        }

        public function añadir_persona($peso_persona) {
            
        }

        //ej3 Cree un constructor en la clase vehículo que tome como argumento el color y el peso.
        public function __construct($color, $peso) {
            $this->color = $color;
            $this->peso = $peso;
        }

        //ej3 Cree el método _toString de la clase vehículo para que muestre información respecto al objeto.
        public function __toString()
        {
            return "Peso y Color: ".$this->peso." ".$this->color."<br>";
            
        }

        //ej5 Cree un método público estático en la clase Vehículo que se designe como ver_atributo.
        //ej5 Este método toma como argumento un objeto y muestra el valor de todos sus atributos (si existen), es decir, el color, el peso, el número de puertas, la cilindrada, la longitud y el número de cadenas para la nieve.
        public static function ver_atributo($nomClase) {
            echo "El color es: ".$nomClase->color."<br>";
            echo "El peso es: ".$nomClase->peso."<br>";
            if (isset($nomClase->numero_puertas)){
                echo "El numero de puertas es: ".$nomClase->numero_puertas."<br>";
            }
            if (isset($nomClase->cilindrada)){
                echo "La cilindrada es: ".$nomClase->cilindrada."<br>";
            }
            if (isset($nomClase->longitud)) {
                echo "La longitud es: ".$nomClase->longitud."<br>";
            }
            if (isset($nomClase->numero_cadenas_nieve)) {
                echo "El numero de cadenas de nieve: ".$nomClase->numero_cadenas_nieve;
            }

        }
    }

    class Cuatro_ruedas extends Vehiculo {
        protected $numero_puertas;

        public function getNumero_puertas() {
            return $this->numero_puertas;
        }

        public function setNumero_puertas($valor) {
            $this->numero_puertas = $valor;
        }

        public function repintar($color) {
        //ej4 Aplique el método repintar(color) para cambiar el color definido en la clase Vehículo.
        
        $this->color = $color;
        }

        //ej5 Defina el método añadir_persona(peso_persona) en la clase Cuatro_ruedas para hacer lo mismo que en la clase vehículo.
        public function añadir_persona($peso_persona) {
            $this->peso = $this->peso+$peso_persona;
            
        }
    } 

    class Dos_ruedas extends Vehiculo {
        protected $cilindrada;

        public function getCilindrada() {
            return $this->cilindrada;
        }

        public function setCilindrada($valor) {
            $this->cilindrada = $valor;
        }

        //ej4 Ejecute el método poner_gasolina(litros) para cambiar el peso definido en la clase Vehículo. En este ejercicio, un litro equivale a un kilo.
        public function poner_gasolina($litros) {
            $this->peso = $this->peso+$litros;

        }

        //ej5 Defina el método añadir_persona(peso_persona) en la clase Dos_ruedas para que este método añada el peso de la persona, más 2 kg del casco del dos ruedas.
        public function añadir_persona($peso_persona) {
            $this->peso = $this->peso+$peso_persona+2;
        }
    }

    class Coche extends Cuatro_ruedas {
        protected $numero_cadenas_nieve = 0;

        public function getNumero_cadenas_nieve() {
            return $this->numero_cadenas_nieve;
        }

        public function setNumero_cadenas_nieve($valor) {
            $this->numero_cadenas_nieve = $valor;
        }

        //ej4 Aplique los métodos añadir_cadenas_nieve() y quitar_cadenas_nieve() modificando el atributo numero_cadenas_nieve.
        public function añadir_cadenas_nieve($num) {
            $this->numero_cadenas_nieve = $this->numero_cadenas_nieve+$num;
        }

        public function quitar_cadenas_nieve($num) {
            $this->numero_cadenas_nieve = $this->numero_cadenas_nieve-$num;
            if ($this->numero_cadenas_nieve<0) {
                $this->numero_cadenas_nieve = 0;
            }
        }

        
    }

    class Camion extends Cuatro_ruedas {
        protected $longitud;

        public function __construct($color, $peso)
        {
            parent::__construct($color, $peso);
            
        }

        

        public function getLongitud() {
            return $this->longitud;
        }

        public function setLongitud($valor) {
            $this->longitud = $valor;
        }
        //ej4 Aplique el método añadir_remolque(longitud_remolque) modificando el atributo longitud.
        public function añadir_remolque($longitud_remolque) {
            $this->longitud = $this->longitud+$longitud_remolque;
        }
    }

?>