<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Opciones</title>
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
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            padding: 20px;
        }

        /* Contenedor del formulario */
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            color: white;
            text-align: center;
        }

        /* Título */
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Botones de opciones */
        .submit-btn {
            width: 100%;
            padding: 10px;
            background: #f39c12;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s, transform 0.2s;
        }

        .submit-btn:hover {
            background: #e67e22;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Selecciona una opción</h1>
        <form action="procesar.php" method="POST">
            <button type="submit" name="opcion" value="formulario.php" class="submit-btn">Añadir comida</button>
            <button type="submit" name="opcion" value="calendario.php" class="submit-btn">Ir al calendario</button>
            <button type="submit" name="opcion" value="estadisticas.php" class="submit-btn">Ir a las estadisticas</button>
        </form>
    </div>
</body>
</html>
