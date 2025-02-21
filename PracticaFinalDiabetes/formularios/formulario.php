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

        .input-group input, .input-group select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            outline: none;
        }

        .input-group input::placeholder, .input-group select {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Botones de seleccionar comida */
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
            transition: background-color 0.3s, transform 0.2s;
        }

        .food-option:hover {
            background-color: #e67e22;
            transform: scale(1.05);
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
            color: #f39c12;
        }

        /* Cambio para la selección de Evento */
        .input-group select {
            background: rgba(255, 255, 255, 0.2); /* Fondo oscuro como la página */
            color: #f39c12; /* Color naranja para el texto */
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .input-group select:focus {
            border-color: #f39c12; /* Resalta con naranja cuando está en foco */
        }

        .event-section {
            transition: max-height 0.5s ease-in-out, opacity 0.5s ease;
            overflow: hidden;
            opacity: 0;
            max-height: 0;
        }

        .event-section.active {
            opacity: 1;
            max-height: 500px;
        }

        /* Estilo para las secciones de Hipoglucemia e Hiperglucemia */
        .event-section {
            background: transparent; /* Fondo transparente */
            border-radius: 5px;
            padding: 15px;
            margin-top: 15px;
            color: white;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <!-- Mostrar mensaje de error si falta algún campo -->
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<p style='color: red; text-align: center;'>Error: Todos los campos obligatorios deben ser completados.</p>";
        }
        ?>
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
                        <button type="button" class="food-option" data-value="Desayuno">Desayuno</button>
                        <button type="button" class="food-option" data-value="Comida">Comida</button>
                        <button type="button" class="food-option" data-value="Cena">Cena</button>
                    </div>
                    <input type="hidden" id="tipo_comida" name="tipo_comida" required>
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

            <!-- Elección de Hipo o Hiper -->
            <div class="form-section">
                <h2>Tipo de Evento</h2>
                <div class="input-group">
                    <label for="evento">Seleccionar Tipo:</label>
                    <select id="evento" name="evento">
                        <option value="">Seleccione...</option>
                        <option value="hipoglucemia">Hipoglucemia (Hipo)</option>
                        <option value="hiperglucemia">Hiperglucemia (Hiper)</option>
                    </select>
                </div>
            </div>

            <!-- Hiperglucemia -->
            <div class="event-section" id="hiperglucemia">
                <h2>Hiperglucemia</h2>
                <div class="input-group">
                    <label for="glucosa_hiper">Glucosa:</label>
                    <input type="number" id="glucosa_hiper" name="glucosa_hiper">
                </div>
                <div class="input-group">
                    <label for="hora_hiper">Hora:</label>
                    <input type="time" id="hora_hiper" name="hora_hiper">
                </div>
                <div class="input-group">
                    <label for="correccion">Corrección:</label>
                    <input type="number" id="correccion" name="correccion">
                </div>
            </div>

            <!-- Hipoglucemia -->
            <div class="event-section" id="hipoglucemia">
                <h2>Hipoglucemia</h2>
                <div class="input-group">
                    <label for="glucosa_hipo">Glucosa:</label>
                    <input type="number" id="glucosa_hipo" name="glucosa_hipo">
                </div>
                <div class="input-group">
                    <label for="hora_hipo">Hora:</label>
                    <input type="time" id="hora_hipo" name="hora_hipo">
                </div>
            </div>

            <!-- Botones -->
            <div class="button-container">
                <button type="submit" class="submit-btn">📤 Enviar Datos</button>
                <button type="button" class="choose-btn" onclick="window.location.href='escoger.php'">📋 Menú Principal</button>
            </div>
        </form>
    </div>

    <script>
        // Funcionalidad para seleccionar tipo de comida
        document.querySelectorAll('.food-option').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.food-option').forEach(btn => btn.style.backgroundColor = '#f39c12');
                button.style.backgroundColor = '#e67e22';
                document.getElementById('tipo_comida').value = button.dataset.value;
            });
        });

        // Funcionalidad para mostrar el formulario de Hipoglucemia o Hiperglucemia
        document.getElementById('evento').addEventListener('change', function() {
            const selectedEvent = this.value;
            const hiperglucemia = document.getElementById('hiperglucemia');
            const hipoglucemia = document.getElementById('hipoglucemia');

            if (selectedEvent === 'hiperglucemia') {
                hiperglucemia.classList.add('active');
                hipoglucemia.classList.remove('active');
            } else if (selectedEvent === 'hipoglucemia') {
                hipoglucemia.classList.add('active');
                hiperglucemia.classList.remove('active');
            } else {
                hipoglucemia.classList.remove('active');
                hiperglucemia.classList.remove('active');
            }
        });
    </script>
</body>
</html>
