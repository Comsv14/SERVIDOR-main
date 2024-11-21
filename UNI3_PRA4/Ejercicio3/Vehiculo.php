<?php
class Vehiculo{
    public $color;
    public $peso;

    public function __construct($color, $peso)
    {
        $this->color = $color;
        $this->peso = $peso;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    function circula(){
        echo('El vehiculo circula.');

    }
    function aniadirPersona($peso_persona){
        $this->peso = $this->peso+$peso_persona;

    }
    function _toString(){
        echo('El peso es: '.$this->peso. ' kg || El color es: '.  $this->color);

    }
}
    ?>