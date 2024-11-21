<?php
    //Crea  una  matriz  para  guardar  a  los  amigos  clasificados  por  diferentes  ciudades.
    $ciudades=array(
        'Madrid'=>[
            'nombre'=>'Pedro',
            'edad'=>32,
            'telefono'=>"91-999.99.99"
        ],
       'Barcelona'=>[
            'nombre'=>'Susana',
            'edad'=>34,
            'telefono'=>"93-000.00.00"
        ],'Toledo'=>[
            'nombre'=>'Sonia',
            'edad'=>42,
            'telefono'=>"925-09.09.09"
        ]
    );
    foreach ($ciudades as $nomCiudad => $ciudad) {
        echo "Ciudad: ", $nomCiudad;
        echo "<ul>";
        foreach ($ciudad as $atrib => $valor) {
            echo "<li> Valor: ", $valor, "</li></br>";        
        }
        echo "</ul>";
    }
?>