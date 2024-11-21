<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>      
<?php 
    /*
        Crea  un  array  con  los  nombre  Pedro,  Ismael,  Sonia,  Clara,  Susana,  Alfonso  y 
        Teresa. 
        Muestra  el  número  de  elementos  que  contiene  y  cada  elemento  en  una 
        lista no numerada de html.
    */
    $nombres=array(
        'Pedro',
        'Ismael',
        'Sonia',
        'Clara',
        'Susana',
        'Alfonso',
        'Teresa'
    );
    $elementos=count($nombres);
    echo "Numero de elementos: ".$elementos;
    echo"<ul>";
        for ($i=0; $i < $elementos; $i++) { 
            echo "<li>Nombre: ".$nombres[$i]."</li>";
        }
    echo"</ul>";
?>
</body>
</html>
