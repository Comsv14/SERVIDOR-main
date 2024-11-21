<?php
    $estadios_futbol = array(
        "Barcelona"=>"El patio de la casa del bicho 🐐",
        "Real Madrid"=>"Santiago Bernabeu",
        "Valencia"=>"Mestalla",
        "Real Sociedad"=>"Anoeta"
    );
    foreach ($estadios_futbol as $ciudad => $estadio) {
        echo "Ciudad(Indice): ",$ciudad," Estadio(valor asociado): ",$estadio,"</br>";
    }
    unset($estadios_futbol['Real Madrid']);
echo"</br>";
echo"</br>";
echo"<ol>";
    foreach ($estadios_futbol as $ciudad => $estadio) {
        echo "<li>Ciudad(Indice): ",$ciudad," Estadio(valor asociado): ",$estadio,"</li></br>";
    }
    echo"</ol>";
?>