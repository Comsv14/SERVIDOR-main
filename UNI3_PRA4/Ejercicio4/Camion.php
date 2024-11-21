<?php
include_once 'Cuatro_Ruedas.php';

class Camion extends Cuatro_Ruedas {
    public $longitud;

    // Constructor inicializa la longitud a 0 por defecto
    public function __construct($color, $peso, $numero_puertas, $longitud = 0)
    {
        parent::__construct($color, $peso, $numero_puertas); // Llama al constructor de Cuatro_Ruedas
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

    function aniadir_remolque($longitud_remolque){
        $this->longitud += $longitud_remolque;
    }

    // Método toString para mostrar los detalles del camión
    public function __toString()
    {
        return parent::__toString() . 
               ' || Longitud: ' . $this->longitud . ' metros';
    }
}
?>

