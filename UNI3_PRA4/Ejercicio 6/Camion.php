<?php
include_once 'Cuatro_ruedas.php';
    class Camion extends Cuatro_ruedas{
        public $longitud;
        public function __construct($color, $peso, $numero_ruedas, $longitud) {
            parent::__construct($color, $peso, $numero_ruedas);
            $this->longitud = $longitud;
        }
        /**
         * Get the value of longitud
         */ 
        public function getLongitud()
        {
                return $this->longitud;
        }

        /**
         * Set the value of longitud
         *
         * @return  self
         */ 
        public function setLongitud($longitud)
        {
                $this->longitud = $longitud;

                return $this;
        }
        function añadir_remolque($longitud){
            $this->setLongitud($longitud);
        }
    }
?>