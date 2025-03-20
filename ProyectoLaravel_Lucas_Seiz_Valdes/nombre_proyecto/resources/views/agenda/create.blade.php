<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nueva entrada en la Agenda</title>
</head>
<body>
    <h1>Insertar nueva entrada en la Agenda</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <!-- Muestra los errores de validación (opcional) -->
    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/agenda/store') }}">
        @csrf
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required><br><br>

        <label for="persona">Persona:</label>
        <select name="persona" required>
            @foreach($personas as $persona)
                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
            @endforeach
        </select><br><br>

        <label>Selecciona un pictograma:</label><br>
        @foreach($imagenes as $img)
            <input type="radio" name="imagen" value="{{ $img->idimagen }}" required>
            <img src="{{ asset($img->imagen) }}" alt="Imagen" width="50">
        @endforeach
        <br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
