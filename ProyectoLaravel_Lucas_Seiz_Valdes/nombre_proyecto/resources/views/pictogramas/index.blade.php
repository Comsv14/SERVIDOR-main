<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Pictogramas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .pictogramas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            justify-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .pictograma {
            text-align: center;
        }
        .pictograma img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            background: white;
        }
        .descripcion {
            margin-top: 5px;
            font-weight: bold;
        }
        .ruta {
            font-size: 0.9em;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Pictogramas</h1>
        <div class="pictogramas">
            @foreach($imagenes as $img)
                <div class="pictograma">
                    <img src="{{ asset($img->imagen) }}" alt="Pictograma">
                    <div class="descripcion">{{ $img->descripcion }}</div>
                    <div class="ruta">{{ $img->imagen }}</div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
