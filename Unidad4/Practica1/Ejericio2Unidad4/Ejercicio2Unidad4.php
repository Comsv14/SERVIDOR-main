<?php
/*
    Y obtener el siguiente mensaje al pulsar el botón RESULTADO: 
    - Menos de 14 años : eres una personita 
    - Entre 15 y 20 años: todavía eres muy joven  
    - De 21 a 40 años: eres una persona joven   
    - Entre 41 y 60 años: eres una persona madura  
    - Más de 60 años: Ya eres una persona mayor    
    - Aún no me has dicho tu edad 
*/
    $seleccion = $_POST['edad'];
    echo $seleccion."<br>";

    if ($seleccion == 'menor14') {
        echo "eres una personita";
    } elseif ($seleccion == 'menor20') {
        echo "todavía eres muy joven";
    } elseif ($seleccion == 'menor40') {
        echo "eres una persona joven";
    } elseif ($seleccion == 'menor60') {
        echo "eres una persona madura";
    } elseif ($seleccion == 'mas60') {
        echo "Ya eres una persona mayor";
    } else {
        echo "Aún no me has dicho tu edad";
    }
?>