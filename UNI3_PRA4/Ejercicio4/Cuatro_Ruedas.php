<?php
include_once 'Vehiculo.php';

class Cuatro_Ruedas extends Vehiculo {
    public $numero_puertas;

    public function __construct($color, $peso, $numero_puertas)
    {
        parent::__construct($color, $peso);
        $this->numero_puertas = $numero_puertas;
    }

    public function getNumero_puertas()
    {
        return $this->numero_puertas;
    }

    public function setNumero_puertas($numero_puertas)
    {
        $this->numero_puertas = $numero_puertas;
        return $this;
    }

    function repintar($color) {
        $this->color = $color;
    }

    public function __toString()
    {
        return parent::__toString() . ', Número de puertas: ' . $this->numero_puertas;
    }
}
?>
