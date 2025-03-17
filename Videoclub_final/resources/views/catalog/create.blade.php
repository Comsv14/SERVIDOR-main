<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VideoClub</title>
</head>
<body>
@extends('layouts.master')
@section('content')Añadir película
<form action="{{route('catalog.store')}}" method="POST">
@csrf
        <!-- Título de la película -->
        <label for="titulo">Título de la película:</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <!-- Año de estreno -->
        <label for="anio">Año de estreno:</label>
        <input type="number" id="year" name="year" required><br><br>
        
        <!-- Director -->
        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required><br><br>
        
        <!-- URL del poster -->
        <label for="poster">URL del poster:</label>
        <input type="url" id="poster" name="poster" required><br><br>
        
        <!-- Sinopsis -->
        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sysnopsis" name="sysnopsis" rows="4" cols="50" required></textarea><br><br>
        
        <!-- Botón de envío -->
        <input type="submit" value="Enviar">
    </form>
@stop





</body>
</html>
