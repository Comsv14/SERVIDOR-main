<?php
class Dos_Ruedas extends Vehiculo{
    public $cilindrada;
    

    public function __construct($cilindrada)
    {
        $this->cilindrada = $cilindrada;
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
     * @return  self
     */ 
    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;

        return $this;
    }
    function poner_gasolina($litros){

    }
}
?>