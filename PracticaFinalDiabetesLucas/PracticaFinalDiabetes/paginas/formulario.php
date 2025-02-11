<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulación de Diabetes</title>
</head>
<body>
    <h1>Registro de Datos para la Diabetes</h1>
    <form action="submit.php" method="POST">
        <!-- Datos del Usuario -->
            <!--
            <h2>Datos del Usuario</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br><br>

            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required><br><br>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>
            -->
        <!-- Datos del Usuario final -->

        <!-- Control de Glucosa -->
        <h2>Control de Glucosa</h2>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="deporte">Minutos de Deporte:</label>
        <input type="number" id="deporte" name="deporte" required><br><br>

        <label for="lenta">Insulina Lenta:</label>
        <input type="number" id="lenta" name="lenta" required><br><br>

        <!-- Comida -->
        <h2>Registro de Comida</h2>
        <label for="tipo_comida">Tipo de Comida:</label>
        <input type="text" id="tipo_comida" name="tipo_comida" required><br><br>

        <label for="gl_1h">Glucosa 1h después:</label>
        <input type="number" id="gl_1h" name="gl_1h" required><br><br>

        <label for="gl_2h">Glucosa 2h después:</label>
        <input type="number" id="gl_2h" name="gl_2h" required><br><br>

        <label for="raciones">Raciones:</label>
        <input type="number" id="raciones" name="raciones" required><br><br>

        <label for="insulina">Insulina:</label>
        <input type="number" id="insulina" name="insulina" required><br><br>

        <!-- Hiperglucemia -->
        <h2>Hiperglucemia</h2>
        <label for="glucosa_hiper">Glucosa:</label>
        <input type="number" id="glucosa_hiper" name="glucosa_hiper" required><br><br>

        <label for="hora_hiper">Hora:</label>
        <input type="time" id="hora_hiper" name="hora_hiper" required><br><br>

        <label for="correccion">Corrección:</label>
        <input type="number" id="correccion" name="correccion" required><br><br>

        <!-- Hipoglucemia -->
        <h2>Hipoglucemia</h2>
        <label for="glucosa_hipo">Glucosa:</label>
        <input type="number" id="glucosa_hipo" name="glucosa_hipo" required><br><br>

        <label for="hora_hipo">Hora:</label>
        <input type="time" id="hora_hipo" name="hora_hipo" required><br><br>

        <button type="submit">Enviar Datos</button>
    </form>
</body>
</html>