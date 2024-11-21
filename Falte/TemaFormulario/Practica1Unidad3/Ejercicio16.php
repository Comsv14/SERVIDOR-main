<?php
/*
    Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu 
    mismo los valores, poniendo índices alfanuméricos a cada valor con tres 
    elementos  cada  uno. Junta ambos arrays en uno solo llamado “lenguajes”  y 
    muéstralo por pantalla en una tabla.
*/
$lenguajes_cliente=array(
    'js'=>'JavaScript',
    'jsx'=>'React',
    'css'=>'CSS'
);
$lenguajes_servidor=array(
    'php'=>'PHP',
    'py'=>'Python',
    'c#'=>'C#'
);

$lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);

echo "<table border='1' style='border-collapse: collapse;'>";
    echo "  <tr>
                <th>Abreviatura</th>
                <th>Lenguaje</th>
            </tr>";

    foreach($lenguajes as $abreviatura => $lenguaje) {
        echo "<tr><td>{$abreviatura}</td><td>{$lenguaje}</td></tr>";
    }
echo "</table>";
?>