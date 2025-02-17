<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulación de Diabetes</title>
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

        /* Botón de seleccionar comida */
        .food-options {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .food-option {
            padding: 10px;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .food-option:hover {
            background-color: #e67e22;
        }

        /* Botón de enviar y escoger */
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .submit-btn, .choose-btn {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .submit-btn {
            background: #f39c12;
        }

        .submit-btn:hover {
            background: #e67e22;
            transform: scale(1.05);
        }

        .choose-btn {
            background: #3498db;
        }

        .choose-btn:hover {
            background: #2980b9;
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
        <h1>Registro de Datos para la Diabetes</h1>
        <form action="submit.php" method="POST">
            <!-- Control de Glucosa -->
            <div class="form-section">
                <h2>Control de Glucosa</h2>
                <div class="input-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>
                <div class="input-group">
                    <label for="deporte">Minutos de Deporte:</label>
                    <input type="number" id="deporte" name="deporte" required>
                </div>
                <div class="input-group">
                    <label for="lenta">Insulina Lenta:</label>
                    <input type="number" id="lenta" name="lenta" required>
                </div>
            </div>

            <!-- Comida -->
            <div class="form-section">
                <h2>Registro de Comida</h2>
                <div class="input-group">
                    <label for="tipo_comida">Tipo de Comida:</label>
                    <div class="food-options">
                        <button type="button" class="food-option" id="desayuno" name="tipo_comida" value="Desayuno">Desayuno</button>
                        <button type="button" class="food-option" id="comida" name="tipo_comida" value="Comida">Comida</button>
                        <button type="button" class="food-option" id="cena" name="tipo_comida" value="Cena">Cena</button>
                    </div>
                </div>
                <div class="input-group">
                    <label for="gl_1h">Glucosa 1h después:</label>
                    <input type="number" id="gl_1h" name="gl_1h" required>
                </div>
                <div class="input-group">
                    <label for="gl_2h">Glucosa 2h después:</label>
                    <input type="number" id="gl_2h" name="gl_2h" required>
                </div>
                <div class="input-group">
                    <label for="raciones">Raciones:</label>
                    <input type="number" id="raciones" name="raciones" required>
                </div>
                <div class="input-group">
                    <label for="insulina">Insulina:</label>
                    <input type="number" id="insulina" name="insulina" required>
                </div>
            </div>

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

            <!-- Hipoglucemia -->
            <div class="form-section">
                <h2>Hipoglucemia</h2>
                <div class="input-group">
                    <label for="glucosa_hipo">Glucosa:</label>
                    <input type="number" id="glucosa_hipo" name="glucosa_hipo" required>
                </div>
                <div class="input-group">
                    <label for="hora_hipo">Hora:</label>
                    <input type="time" id="hora_hipo" name="hora_hipo" required>
                </div>
            </div>

            <!-- Contenedor de los botones -->
            <div class="button-container">
                <button type="submit" class="submit-btn">Enviar Datos</button>
                <button type="button" class="choose-btn" onclick="window.location.href='escoger.php'">Ir a Escoger</button>
            </div>
        </form>
    </div>

    <script>
        // Funcionalidad para seleccionar tipo de comida
        document.querySelectorAll('.food-option').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.food-option').forEach(btn => btn.style.backgroundColor = '#f39c12');
                button.style.backgroundColor = '#e67e22';
                document.getElementById('tipo_comida').value = button.value;
            });
        });
    </script>
</body>
</html>
