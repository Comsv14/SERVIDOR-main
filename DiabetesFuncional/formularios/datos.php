<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "diabetesdb";
$username = "root";  // Cambia esto si tienes otro usuario
$password = "";      // Cambia esto si tienes contraseña

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener la fecha seleccionada
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');
$id_usu = 1; // Cambiar por usuario autenticado

// Consultar datos
$sql = "SELECT 
            c.fecha, 
            c.deporte, 
            c.lenta, 
            cm.tipo_comida, 
            cm.gl_1h, 
            cm.gl_2h, 
            cm.raciones, 
            cm.insulina AS insulina_comida,
            h.glucosa AS glucosa_hipo, 
            h.hora AS hora_hipo, 
            h.tipo_comida AS tipo_comida_hipo, 
            g.glucosa AS glucosa_hiper, 
            g.hora AS hora_hiper, 
            g.correccion AS correccion_hiper 
        FROM CONTROL_GLUCOSA c
        LEFT JOIN COMIDA cm ON c.fecha = cm.fecha AND c.id_usu = cm.id_usu
        LEFT JOIN HIPOGLUCEMIA h ON cm.tipo_comida = h.tipo_comida AND cm.fecha = h.fecha AND cm.id_usu = h.id_usu
        LEFT JOIN HIPERGLUCEMIA g ON cm.tipo_comida = g.tipo_comida AND cm.fecha = g.fecha AND cm.id_usu = g.id_usu
        WHERE c.fecha = '$fecha' AND c.id_usu = $id_usu";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del <?php echo $fecha; ?></title>
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

        .contenedor {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            width: 95%;  /* Ancho más grande para ajustarse */
            max-width: 1500px; /* Aumento el máximo */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            overflow: hidden;
            height: auto;
            max-height: 1200px;
            overflow-y: auto;
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            word-wrap: break-word; /* Permite que el contenido largo se divida */
        }

        th, td {
            padding: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
            font-size: 1.1rem;
            word-wrap: break-word;
            overflow: hidden;
        }

        th {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        td {
            color: #ddd;
        }

        .nav {
            margin-bottom: 30px;
        }

        .nav a {
            text-decoration: none;
            color: white;
            background: #e67e22;
            padding: 15px 20px;
            border-radius: 7px;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .nav a:hover {
            background: #d35400;
        }

        .nav a:active {
            transform: scale(0.98);
        }

        .tabla-div {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .tabla-div table {
            width: 48%; /* Para que las tablas se dividan igualmente */
        }
    </style>
</head>
<body>

<div class="contenedor">
    <div class="nav">
        <a href="calendario.php">⬅ Volver al Calendario</a>
    </div>
    <h2>Datos del <?php echo $fecha; ?></h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<div class='tabla-div'>";
        
        // Tabla 1 - Deporte e Insulina Lenta
        echo "<table>";
        echo "<tr><th>Fecha</th><th>Deporte</th><th>Insulina Lenta</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['fecha']}</td>
                    <td>{$row['deporte']} min</td>
                    <td>{$row['lenta']} U</td>
                </tr>";
        }
        echo "</table>";

        // Tabla 2 - Comida y Glucosa
        echo "<table>";
        echo "<tr><th>Tipo de Comida</th><th>Glucosa 1h</th><th>Glucosa 2h</th><th>Raciones</th><th>Insulina Comida</th><th>Glucosa Hipo</th><th>Hora Hipo</th><th>Glucosa Hiper</th><th>Hora Hiper</th><th>Corrección Hiper</th></tr>";
        $result->data_seek(0); // Restablecer el puntero para la segunda tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['tipo_comida']}</td>
                    <td>{$row['gl_1h']} mg/dL</td>
                    <td>{$row['gl_2h']} mg/dL</td>
                    <td>{$row['raciones']}</td>
                    <td>{$row['insulina_comida']} U</td>
                    <td>{$row['glucosa_hipo']} mg/dL</td>
                    <td>{$row['hora_hipo']}</td>
                    <td>{$row['glucosa_hiper']} mg/dL</td>
                    <td>{$row['hora_hiper']}</td>
                    <td>{$row['correccion_hiper']} U</td>
                </tr>";
        }
        echo "</table>";
        
        echo "</div>";
    } else {
        echo "<p>No hay datos para este día.</p>";
    }
    ?>

</div>

</body>
</html>

<?php
$conn->close();
?>
