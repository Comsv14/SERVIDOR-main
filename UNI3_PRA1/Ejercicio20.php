<?php
// Definir el array asociativo con los estadios de fútbol
$estadios_futbol = array(
    "Barcelona" => "Camp Nou",
    "Real Madrid" => "Santiago Bernabéu",
    "Valencia" => "Mestalla",
    "Real Sociedad" => "Anoeta"
);

// Mostrar los valores del array en una tabla
echo "<h3>Estadios de Fútbol (Antes de eliminar)</h3>";
echo "<table border='1'>";
echo "<tr><th>Equipo</th><th>Estadio</th></tr>";

foreach ($estadios_futbol as $equipo => $estadio) {
    echo "<tr><td>$equipo</td><td>$estadio</td></tr>";
}

echo "</table>";

// Eliminar el estadio asociado al Real Madrid
unset($estadios_futbol["Real Madrid"]);

// Mostrar los valores después de eliminar el estadio del Real Madrid en una lista numerada
echo "<h3>Estadios de Fútbol (Después de eliminar Real Madrid)</h3>";
echo "<ol>"; // Comienza una lista numerada

foreach ($estadios_futbol as $equipo => $estadio) {
    echo "<li>$equipo: $estadio</li>";
}

echo "</ol>"; // Cierra la lista numerada
?>
