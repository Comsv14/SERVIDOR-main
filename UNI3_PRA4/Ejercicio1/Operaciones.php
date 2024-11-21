<?php

class Operaciones{
    public $num1;
    public $num2;
    
    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;   
    }

    /**
     * Get the value of num1
     */ 
    public function getNum1()
    {
        return $this->num1;
    }

    /**
     * Set the value of num1
     *
     * @return  self
     */ 
    public function setNum1($num1)
    {
        $this->num1 = $num1;

        return $this;
    }

    /**
     * Get the value of num2
     */ 
    public function getNum2()
    {
        return $this->num2;
    }

    /**
     * Set the value of num2
     *
     * @return  self
     */ 
    public function setNum2($num2)
    {
        $this->num2 = $num2;

        return $this;
    }

    function __toString(){
        return ( "Número 1: ".$this->num1."<br>". "Número 2: ".  $this->num2). "<br>";
    }
    function suma(){
        $result =$this->num1 + $this->num2;
        echo ("El resultado de la suma es: ".$result);
    }
    function resta(){
        $result =$this->num1 - $this->num2;
        echo ("El resultado de la resta es: ".$result);
    }
    function multiplicacion(){
        $result =$this->num1 * $this->num2;
        echo ("El resultado de la multiplicación es: ".$result);
    }
    function division(){
        $result =$this->num1 / $this->num2;
        echo ("El resultado de la división es: ".$result);
    }
}
?>