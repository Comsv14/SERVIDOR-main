<?php
class Coche extends Dos_Ruedas{
    public $numero_cadenas_nieve;
    

    public function __construct($numero_cadenas_nieve)
    {
        $this->$numero_cadenas_nieve = $numero_cadenas_nieve;
    }

    /**
     * Get the value of numero_cadenas_nieve
     */ 
    public function getNumero_cadenas_nieve()
    {
        return $this->numero_cadenas_nieve;
    }

    /**
     * Set the value of numero_cadenas_nieve
     *
     * @return  self
     */ 
    public function setNumero_cadenas_nieve($numero_cadenas_nieve)
    {
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;

        return $this;
    }
    function aniadir_cadenas_nieve($num){

    }
    function quitar_cadenas_nieve($num){
        
    }
}

?>