<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "diabetesdb";
$user = "root"; // Cambiar si es necesario
$password = ""; // Cambiar si es necesario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener el mes y año actual
$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

// Calcular el primer y último día del mes
$primerDia = date('Y-m-01', strtotime("$anio-$mes-01"));
$ultimoDia = date('Y-m-t', strtotime("$anio-$mes-01"));

// Consultar eventos en la base de datos
$sql = "SELECT fecha, 'Glucosa' AS tipo FROM CONTROL_GLUCOSA 
        UNION 
        SELECT fecha, 'Comida' FROM COMIDA
        UNION 
        SELECT fecha, 'Hiperglucemia' FROM HIPERGLUCEMIA
        UNION 
        SELECT fecha, 'Hipoglucemia' FROM HIPOGLUCEMIA";
$stmt = $pdo->query($sql);
$eventos = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $eventos[$row['fecha']][] = $row['tipo'];
}

// Generar la estructura del calendario
$diaSemana = date('N', strtotime($primerDia)); // Día de la semana del primer día
$diasMes = date('t', strtotime($primerDia)); // Días en el mes

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Diabetes</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .calendario {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            background: rgba(255, 255, 255, 0.2);
        }

        .evento {
            background: #f39c12;
            color: white;
            padding: 5px;
            border-radius: 5px;
            display: block;
            margin: 2px 0;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .nav a {
            text-decoration: none;
            color: white;
            background: #e67e22;
            padding: 5px 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav a:hover {
            background: #d35400;
        }
    </style>
</head>
<body>

<div class="calendario">
    <div class="nav">
        <a href="?mes=<?= ($mes == 1) ? 12 : $mes - 1 ?>&anio=<?= ($mes == 1) ? $anio - 1 : $anio ?>">◀ Mes Anterior</a>
        <h1><?= date("F Y", strtotime($primerDia)) ?></h1>
        <a href="?mes=<?= ($mes == 12) ? 1 : $mes + 1 ?>&anio=<?= ($mes == 12) ? $anio + 1 : $anio ?>">Mes Siguiente ▶</a>
    </div>

    <table>
        <tr>
            <th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th>
        </tr>
        <tr>
            <?php
            // Espacios vacíos antes del primer día
            for ($i = 1; $i < $diaSemana; $i++) {
                echo "<td></td>";
            }

            // Días del mes
            for ($dia = 1; $dia <= $diasMes; $dia++) {
                $fecha = "$anio-$mes-" . str_pad($dia, 2, "0", STR_PAD_LEFT);
                echo "<td>";
                echo "<strong>$dia</strong>";

                // Mostrar eventos del día
                if (isset($eventos[$fecha])) {
                    foreach ($eventos[$fecha] as $evento) {
                        echo "<span class='evento'>$evento</span>";
                    }
                }

                echo "</td>";

                // Salto de línea en domingo
                if ((($dia + $diaSemana - 1) % 7) == 0) {
                    echo "</tr><tr>";
                }
            }

            // Espacios vacíos después del último día
            while ((($dia + $diaSemana - 1) % 7) != 1) {
                echo "<td></td>";
                $dia++;
            }
            ?>
        </tr>
    </table>
</div>

</body>
</html>
