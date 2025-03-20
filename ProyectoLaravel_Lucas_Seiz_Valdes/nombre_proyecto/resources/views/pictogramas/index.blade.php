<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Pictogramas</title>
</head>
<body>
    <h1>Listado de Pictogramas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Ruta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imagenes as $img)
                <tr>
                    <td>{{ $img->idimagen }}</td>
                    <td>{{ $img->categoria }}</td>
                    <td>
                        <img src="{{ asset($img->imagen) }}" alt="Pictograma" width="80">
                    </td>
                    <td>{{ $img->descripcion }}</td>
                    <td>{{ asset($img->imagen) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
