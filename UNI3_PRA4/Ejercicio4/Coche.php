<?php
include_once 'Cuatro_Ruedas.php';

class Coche extends Cuatro_Ruedas {
    public $numero_cadenas_nieve;

    public function __construct($color, $peso, $numero_puertas, $numero_cadenas_nieve = 0)
    {
        parent::__construct($color, $peso, $numero_puertas);
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;
    }

    public function getNumero_cadenas_nieve()
    {
        return $this->numero_cadenas_nieve;
    }

    public function setNumero_cadenas_nieve($numero_cadenas_nieve)
    {
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;
        return $this;
    }

    function aniadir_cadenas_nieve($num) {
        $this->numero_cadenas_nieve += $num;
    }

    function quitar_cadenas_nieve($num) {
        $this->numero_cadenas_nieve -= $num;
    }

    public function __toString()
    {
        return parent::__toString() . ', Número de cadenas de nieve: ' . $this->numero_cadenas_nieve;
    }
}
?>

