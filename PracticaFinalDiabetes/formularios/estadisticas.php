<?php
// Establecer la conexión con la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=DiabetesDB', 'root', '');

// Preparar la consulta SQL
$sql = "SELECT DAY(fecha) AS dia, lenta FROM CONTROL_GLUCOSA WHERE MONTH(fecha) = :mes AND YEAR(fecha) = :anio";
$stmt = $pdo->prepare($sql);

// Ejecutar la consulta con los parámetros de mes y año
$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');  // Mes actual por defecto
$anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y'); // Año actual por defecto
$stmt->bindParam(':mes', $mes);
$stmt->bindParam(':anio', $anio);
$stmt->execute();

// Obtener los resultados
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar si hay datos y generar la gráfica
if (!$resultado) {
    $mensaje = "No hay datos disponibles para el mes y año seleccionados.";
} else {
    // Crear arrays para los datos de la gráfica
    $dias = range(1, 31);  // Asegura que se muestren los 31 días del mes
    $niveles_glucosa = array_fill(0, 31, null);  // Inicializa todos los valores de glucosa como null

    // Llenar los datos de glucosa en el array correspondiente
    foreach ($resultado as $row) {
        $dia = $row['dia'] - 1;  // Los días empiezan desde 1, pero los arrays comienzan desde 0
        $niveles_glucosa[$dia] = $row['lenta'];  // Asignar el valor de glucosa para ese día
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Glucosa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Fondo con degradado elegante */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            overflow: hidden;
        }

        /* Contenedor a pantalla completa */
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            height: 100%;
            max-width: 1200px;  /* Para evitar que el contenedor sea demasiado grande en pantallas grandes */
            text-align: center;
            color: white;
            overflow: auto;
        }

        /* Título */
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Inputs */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            outline: none;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Botón de ver estadísticas (naranja) */
        .login-btn {
            width: 100%;
            padding: 10px;
            background: #f39c12;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-btn:hover {
            background: #e67e22;
            transform: scale(1.05);
        }

        /* Contenedor de respuesta */
        .response-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            color: white;
        }

        /* Estilo de los enlaces */
        .response-container a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }

        .response-container a:hover {
            color: #e67e22;
        }

        /* Estilo para los mensajes */
        .response-container p {
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Gráfica de Niveles de Glucosa</h2>

    <!-- Formulario para seleccionar mes y año -->
    <form method="GET" action="estadisticas.php">
        <div class="input-group">
            <label for="mes">Mes:</label>
            <input type="number" name="mes" id="mes" value="<?php echo $mes; ?>" min="1" max="12" required>
        </div>
        <div class="input-group">
            <label for="anio">Año:</label>
            <input type="number" name="anio" id="anio" value="<?php echo $anio; ?>" min="2000" max="3000" required>
        </div>
        <button type="submit" class="login-btn">Ver Estadísticas</button>
    </form>

    <!-- Mostrar la gráfica -->
    <?php if ($resultado): ?>
        <canvas id="glucosaChart"></canvas>
        <script>
            const ctx = document.getElementById('glucosaChart').getContext('2d');
            const glucosaChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($dias); ?>, // Días del mes
                    datasets: [{
                        label: 'Nivel de Glucosa',
                        data: <?php echo json_encode($niveles_glucosa); ?>, // Niveles de glucosa
                        backgroundColor: '#f39c12',
                        borderColor: '#e67e22',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nivel de Glucosa',
                                color: '#fff',  // Color de las etiquetas del eje Y
                                font: {
                                    size: 14,  // Tamaño de las etiquetas del eje Y
                                }
                            },
                            ticks: {
                                color: '#f39c12'  // Color de los números en el eje Y
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Días del Mes',
                                color: '#fff',  // Color de las etiquetas del eje X
                                font: {
                                    size: 14,  // Tamaño de las etiquetas del eje X
                                }
                            },
                            ticks: {
                                color: '#f39c12'  // Color de los números en el eje X
                            }
                        }
                    }
                }
            });
        </script>
    <?php else: ?>
        <div class="response-container">
            <p><?php echo $mensaje; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
