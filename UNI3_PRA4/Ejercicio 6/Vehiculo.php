<?php
abstract class Vehiculo {
    public $color;
    public $peso;
    
/*
    -Añada una constante SALTO_DE_LINEA =’<br />’ en la clase Vehículo y 
    modifique el método ver_atributo($objeto) para sustituir los ’<br />’.

    -Añada un atributo estático protegido en esta clase que se llame 
    numero_cambio_color e inicialice a 0.  
*/
    static protected $numero_cambio_color = 0;
    const SALTO_DE_LINEA ='<br />';
    public function __construct($color,$peso)
    {
        $this->color = $color;
        $this->peso = $peso;
    }

    public function circula() {
        echo "El vehículo circula</br>";
    }
    
    abstract function añadir_persona($peso_persona);

    public static  function ver_atributo($objeto){
        /*
        if (isset($objeto)){
            foreach ($objeto as $key => $value) {
                echo "key: ".$key." value: ".$value;
            }  
        }
        */
        $obj=get_object_vars($objeto);
        
        foreach ($obj as $key => $value) {
            echo $key . ": " . $value . self::SALTO_DE_LINEA;
        }
        echo"El color se ha cambiado: ".self::$numero_cambio_color. " vez. </br>";
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
            self::$numero_cambio_color++;
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
    public function setPeso($peso) {
        if ($peso <= 2100) {
            $this->peso = $peso;
        } else {
            $this->peso = 2100;
            echo "El peso máximo permitido es de 2100 kg.";
        }
    }
    public function __toString() {
        return "Color " . $this->color . " Peso: " . $this->peso . " kg.</br>";
    }
}
?>