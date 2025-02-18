<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Hiperglucemia</title>
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
        }

        /* Título */
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #f39c12;
        }

        /* Grupos de inputs */
        .input-group {
            margin-bottom: 15px;
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

        /* Botón de enviar */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .submit-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #f39c12;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .submit-btn:hover {
            background: #e67e22;
            transform: scale(1.05);
        }

        /* Secciones del formulario */
        .form-section {
            margin-bottom: 30px;
        }

        .form-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registro de Hiperglucemia</h1>
        <form action="submit.php" method="POST">
            <!-- Hiperglucemia -->
            <div class="form-section">
                <h2>Hiperglucemia</h2>
                <div class="input-group">
                    <label for="glucosa_hiper">Glucosa:</label>
                    <input type="number" id="glucosa_hiper" name="glucosa_hiper" required>
                </div>
                <div class="input-group">
                    <label for="hora_hiper">Hora:</label>
                    <input type="time" id="hora_hiper" name="hora_hiper" required>
                </div>
                <div class="input-group">
                    <label for="correccion">Corrección:</label>
                    <input type="number" id="correccion" name="correccion" required>
                </div>
            </div>

            <!-- Botón de enviar -->
            <div class="button-container">
                <button type="submit" class="submit-btn">Enviar Hiperglucemia</button>
            </div>
        </form>
    </div>
</body>
</html>
