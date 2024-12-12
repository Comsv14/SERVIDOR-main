<?php
     class Vehiculo {
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
            $this->peso = $this->peso+$peso_persona;
            return "Se sube una persona <br>";
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
    } 

    class Dos_ruedas extends Vehiculo {
        private $cilindrada;

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

        
    }

    class Coche extends Cuatro_ruedas {
        private $numero_cadenas_nieve = 0;

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
        private $longitud = 0;

        public function __construct($color, $peso, $longitud, $puertas)
        {
            parent::__construct($color, $peso);
            $this->longitud = $longitud;
            $this->numero_puertas = $puertas;
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