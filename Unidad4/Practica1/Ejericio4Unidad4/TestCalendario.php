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
        .navegacion {
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Generar Calendario</h2>
<form method="post" style="text-align:center;">
    <label for="mes">Mes:</label>
    <input type="number" id="mes" name="mes" min="1" max="12" value="<?php echo isset($_POST['mes']) ? $_POST['mes'] : date('n'); ?>" required>
    <label for="anio">Año:</label>
    <input type="number" id="anio" name="anio" min="1900" max="2100" value="<?php echo isset($_POST['anio']) ? $_POST['anio'] : date('Y'); ?>" required>
    <button type="submit">ENVIAR</button>
</form>

<?php
if (isset($_POST['mes']) && isset($_POST['anio'])) {
    $mes = intval($_POST['mes']);
    $anio = intval($_POST['anio']);

    // Comprobar si el mes y el año son válidos
    if ($mes < 1 || $mes > 12 || $anio < 1900 || $anio > 2100) {
        echo "<p>Por favor, ingrese un mes entre 1 y 12, y un año válido entre 1900 y 2100.</p>";
        exit;
    }

    // Navegación: Ajustar el mes y el año para los botones "Anterior" y "Siguiente"
    $mes_anterior = $mes - 1;
    $anio_anterior = $anio;
    if ($mes_anterior < 1) {
        $mes_anterior = 12;
        $anio_anterior--;
    }

    $mes_siguiente = $mes + 1;
    $anio_siguiente = $anio;
    if ($mes_siguiente > 12) {
        $mes_siguiente = 1;
        $anio_siguiente++;
    }

    // Obtener el número de días del mes y el día de la semana en que comienza
    $primer_dia = mktime(0, 0, 0, $mes, 1, $anio);
    $dias_mes = date('t', $primer_dia); // Número de días del mes
    $dia_semana_comienzo = date('N', $primer_dia) - 1; // Día de la semana (0 para lunes, 6 para domingo)

    // Array de nombres de días (empezando por lunes)
    $dias_semana = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];

    // Mostrar el título del calendario con el mismo ancho que la tabla
    echo "<div class='calendario-titulo'>Calendario $mes/$anio</div>";

    // Navegación: Enlaces a mes anterior y siguiente
    echo "<div class='navegacion'>";
    echo "<a href='?mes=$mes_anterior&anio=$anio_anterior'>&laquo; Mes Anterior</a> | ";
    echo "<a href='?mes=$mes_siguiente&anio=$anio_siguiente'>Mes Siguiente &raquo;</a>";
    echo "</div>";

    echo "<table>";
    echo "<tr>";
    // Imprimir los nombres de los días de la semana
    foreach ($dias_semana as $dia) {
        echo "<th>$dia</th>";
    }
    echo "</tr><tr>";

    // Crear celdas vacías hasta el primer día del mes
    for ($i = 0; $i < $dia_semana_comienzo; $i++) {
        echo "<td></td>";
    }

    // Llenar el calendario con los días del mes
    for ($dia = 1; $dia <= $dias_mes; $dia++) {
        echo "<td>$dia</td>";
        // Salto de línea al terminar domingo
        if (($dia + $dia_semana_comienzo) % 7 == 0 && $dia < $dias_mes) {
            echo "</tr><tr>";
        }
    }

    // Completar las celdas vacías al final de la semana
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
