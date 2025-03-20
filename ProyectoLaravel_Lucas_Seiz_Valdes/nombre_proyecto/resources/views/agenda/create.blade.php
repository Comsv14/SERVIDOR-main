<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva entrada en la Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .pictogramas {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            justify-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 8px;
            margin-top: 10px;
        }
        .pictograma {
            text-align: center;
            width: 100%;
        }
        .pictograma img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border: 2px solid #ddd;
            padding: 5px;
            border-radius: 8px;
            background: white;
        }
        .pictograma input {
            margin-top: 5px;
        }
        .descripcion {
            font-weight: bold;
            margin-top: 5px;
        }
        .botones {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: white;
        }
        .guardar {
            background-color: #007bff;
        }
        .guardar:hover {
            background-color: #0056b3;
        }
        .volver {
            background-color: #6c757d;
        }
        .volver:hover {
            background-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Insertar nueva entrada en la Agenda</h1>

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

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
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" required>
            </div>

            <div class="form-group">
                <label for="persona">Id. persona:</label>
                <select name="persona" required>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <label>Selecciona una imagen:</label>
            <div class="pictogramas">
                @foreach($imagenes as $img)
                    <div class="pictograma">
                        <input type="radio" name="imagen" value="{{ $img->idimagen }}" required>
                        <br>
                        <img src="{{ asset($img->imagen) }}" alt="Imagen">
                        <div class="descripcion">Imagen: {{ $img->idimagen }}</div>
                        <div>{{ $img->descripcion }}</div>
                    </div>
                @endforeach
            </div>

            <div class="botones">
                <button type="submit" class="guardar">Añadir entrada en agenda</button>
                <button type="button" class="volver" onclick="window.location.href='{{ url('/agenda') }}'">← Volver al listado</button>
            </div>
        </form>
    </div>
</body>
</html>
