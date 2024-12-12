<?php
    /*
        Crear la clase Operaciones con los métodos necesarios para a partir del código
        mostrado debajo muestre el siguiente resultado:

            // crear una objeto de clase Operaciones
            $operar = new Operaciones(50, 20); 
            //mostrar el objeto operar, usa el método __toString()
            echo $operar . "<br>"; 
            //mostrar operaciones básicas usando los métodos suma, resta, multiplicacion y division
            echo $operar->suma() . "<br>";
            echo $operar->resta() . "<br>"; 
            echo $operar->multiplicacion() . "<br>"; 
            echo $operar->division() . "<br>"; 

        Numeros: 50 20
        Suma: 70
        Resta: -30
        Multiplicacion: 1000
        Division: 0.4

    */
    class Operaciones {

        protected $n1;
        protected $n2;

        function __toString() {
            return "Numeros: $this->n1 $this->n2";
        }

        function __construct($n1,$n2)
        {
            $this->n1 = $n1;
            $this->n2 = $n2;
        }

        function suma() {
            $resul = $this->n1+$this->n2;
            return $resul;
        }

        function resta() {
            $resul = $this->n1-$this->n2;
            return $resul;
        }

        function multiplicacion() {
            $resul = $this->n1*$this->n2;
            return $resul;
        }

        function division() {
            $resul = $this->n1/$this->n2;
            return $resul;
        }

    }

    // crear una objeto de clase Operaciones
    $operar = new Operaciones(50, 20); 
    //mostrar el objeto operar, usa el método __toString()
    echo $operar . "<br>"; 
    //mostrar operaciones básicas usando los métodos suma, resta, multiplicacion y division
    echo $operar->suma() . "<br>";
    echo $operar->resta() . "<br>"; 
    echo $operar->multiplicacion() . "<br>"; 
    echo $operar->division() . "<br>"; 
    
    

?>