<?php
class Coche extends Dos_Ruedas{
    public $longitud;
    public function __construct($longitud)
    {
        $this->$longitud = $longitud;
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
    function aniadir_remolque($longitud_remolque){
        
    }
}
?>