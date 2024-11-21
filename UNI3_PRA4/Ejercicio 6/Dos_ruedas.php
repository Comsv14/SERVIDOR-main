<?php
include_once 'Vehiculo.php';
    class Dos_ruedas extends Vehiculo{
        public $cilindrada;
            function añadir_persona($peso_persona)
            {
                $this->peso=$this->getPeso()+$peso_persona+2;
            }
        
            function poner_gasolina($litros){
                $this->setPeso($this->getPeso()+$litros);
            }
        
            /**
             * Get the value of cilindrada
             */
            public function getCilindrada()
            {
                return $this->cilindrada;
            }
        
            /**
             * Set the value of cilindrada
             *
             * @return self
             */
            public function setCilindrada($cilindrada)
            {
                $this->cilindrada = $cilindrada;
        
                return $this;
            }
        }
?>