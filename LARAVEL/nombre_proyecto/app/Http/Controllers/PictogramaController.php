<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class PictogramaController extends Controller
{
    // Listado de pictogramas (Ejercicio 1)
    public function index()
    {
        // Recupera todos los registros de la tabla 'imagenes'
        $imagenes = Imagen::all();
        // Retorna la vista con la lista de imágenes
        return view('pictogramas.index', compact('imagenes'));
    }
}
