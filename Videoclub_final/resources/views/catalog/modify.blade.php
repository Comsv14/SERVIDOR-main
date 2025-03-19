<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VideoClub</title>
</head>
<body>
@extends('layouts.master')
@section('content')Añadir película
<form action="{{ route('catalog.mstore', $pelicula->id) }}" method="POST">
    @csrf
    <!-- Título de la película -->
    <label for="title">Título de la película:</label>
    <input type="text" id="title" name="title" value="{{ $pelicula->title }}" required><br><br>

    <!-- Año de estreno -->
    <label for="year">Año de estreno:</label>
    <input type="number" id="year" name="year" value="{{ $pelicula->year }}" required><br><br>

    <!-- Director -->
    <label for="director">Director:</label>
    <input type="text" id="director" name="director" value="{{ $pelicula->director }}" required><br><br>

    <!-- URL del poster -->
    <label for="poster">URL del poster:</label>
    <input type="url" id="poster" name="poster" value="{{ $pelicula->poster }}" required><br><br>

    <!-- Sinopsis -->
    <label for="synopsis">Sinopsis:</label><br>
    <textarea id="synopsis" name="synopsis" rows="4" cols="50" required>{{ $pelicula->synopsis }}</textarea><br><br>

    <!-- Botón de envío -->
    <input type="submit" value="Enviar">
</form>
@stop





</body>
</html>