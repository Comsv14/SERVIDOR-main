<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario en PHP</title>
    <style>
        * {
            box-sizing: border-box;
        }
        table {
            width: 300px;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            width: 40px;
            height: 40px;
            text-align: center;
            border: 1px solid #000;
        }
        th {
            background-color: blue;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        .calendario-titulo {
            width: 300px;
            background-color: blue;
            color: white;
            text-align: center;
            padding: 10px;
            margin: 0 auto;
            font-size: 18px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Generar Calendario</h2>
<form method="post" style="text-align:center;">
    <label for="mes">Mes:</label>
    <input type="number" id="mes" name="mes" min="1" max="12" required>
    <label for="anio">Año:</label>
    <input type="number" id="anio" name="anio" min="1900" max="2100" required>
    <button type="submit">ENVIAR</button>
</form>

<?php
// Comprobar si el formulario ha sido enviado comprobando si las variables existen
if (isset($_POST['mes']) && isset($_POST['anio'])) {
    $mes = intval($_POST['mes']);//comprobar que los valores sean numericos
    $anio = intval($_POST['anio']);

    // Validar mes y año
    if ($mes < 1 || $mes > 12 || $anio < 1900 || $anio > 2100) {
        echo "<p>Por favor, ingrese un mes entre 1 y 12, y un año válido entre 1900 y 2100.</p>";
        exit;
    }

    // Obtener número de días del mes y el día de la semana en que comienza
    $primer_dia = mktime(0, 0, 0, $mes, 1, $anio);
    $dias_mes = date('t', $primer_dia); // Días del mes
    $dia_semana_comienzo = date('N', $primer_dia) - 1; // 0 para lunes, 6 para domingo

    // Array de nombres de días (empezando por lunes)
    $dias_semana = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];

    // Título del calendario
    echo "<div class='calendario-titulo'>Calendario $anio</div>";
    
    echo "<table>";
    echo "<tr>";
    // Nombres de los días de la semana
    foreach ($dias_semana as $dia) {
        echo "<th>$dia</th>";
    }
    echo "</tr><tr>";

    // Celdas vacías hasta el primer día del mes
    for ($i = 0; $i < $dia_semana_comienzo; $i++) {
        echo "<td></td>";
    }

    // Rellenar calendario con días del mes
    for ($dia = 1; $dia <= $dias_mes; $dia++) {
        echo "<td>$dia</td>";
        // Salto de línea al terminar domingo
        if (($dia + $dia_semana_comienzo) % 7 == 0 && $dia < $dias_mes) {
            echo "</tr><tr>";
        }
    }

    // Celdas vacías al final de la semana
    while (($dia_semana_comienzo + $dias_mes) % 7 != 0) {
        echo "<td></td>";
        $dia_semana_comienzo++;
    }

    echo "</tr>";
    echo "</table>";
}
?>

</body>
</html>