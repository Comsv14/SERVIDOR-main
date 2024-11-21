<?php
abstract class Vehiculo {
    public $color;
    public $peso;

    public function __construct($color, $peso) {
        $this->color = $color;
        $this->peso = $peso;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
        return $this;
    }

    public function circula() {
        echo 'El vehiculo circula.';
    }

    public function aniadirPersona($peso_persona) {
        $this->peso += $peso_persona;
    }

    public function _toString() {
        return 'El peso es: ' . $this->peso . ' kg || El color es: ' . $this->color;
    }

    public function __toString() {
        return "Color: {$this->color}, Peso: {$this->peso} kg";
    }
}
?>
