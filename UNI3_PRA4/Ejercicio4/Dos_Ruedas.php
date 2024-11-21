<?php
include_once 'Vehiculo.php';

class Dos_Ruedas extends Vehiculo {
    public $cilindrada;

    public function __construct($color, $peso, $cilindrada = 0)
    {
        parent::__construct($color, $peso);
        $this->cilindrada = $cilindrada;
    }

    public function getCilindrada()
    {
        return $this->cilindrada;
    }

    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;
        return $this;
    }

    function poner_gasolina($litros) {
        $this->peso += $litros;
    }

    public function __toString()
    {
        return parent::__toString() . ', Cilindrada: ' . $this->cilindrada . ' cc';
    }
}
?>

