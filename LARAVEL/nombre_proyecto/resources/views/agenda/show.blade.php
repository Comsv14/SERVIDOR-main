<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultar Agenda</title>
</head>
<body>
    <h1>Consultar Agenda de un Día</h1>
    <!-- Formulario para seleccionar fecha y persona -->
    <form method="POST" action="{{ url('/agenda/show') }}">
        @csrf
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label for="persona">Persona:</label>
        <select name="persona" required>
            @foreach($personas as $persona)
                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Consultar</button>
    </form>

    <!-- Mostramos la agenda si está definida la variable $agenda -->
    @if(isset($agenda))
        <h2>Agenda para la Fecha Seleccionada</h2>
        <table border="1">
            <tr>
                <th>Pictograma</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            @foreach($agenda as $item)
                <tr>
                    <td>
                        <img src="{{ asset($item->imagen) }}" alt="Pictograma" width="50">
                    </td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->hora }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
