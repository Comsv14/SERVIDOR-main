<?php

namespace App\Http\Controllers;

use App\Models\Pelis;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
   
	/*
	2- Método show
	3- Método edit
	 */

    

    public function getShow()
    {
        
        $peliculas = Pelis::all();  

        // Pasar los datos a la vista
        return view('catalog.show', [
            'arrayPeliculas' => $peliculas
        ]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getModify($id)
    {
        $pelicula = Pelis::find($id);

    // Si no se encuentra la película, redirigir con un mensaje de error
    if (!$pelicula) {
        return redirect()->route('catalogshow')->with('error', 'Pelicula no encontrada');
    }

    // Pasar la película a la vista
    return view('catalog.modify', compact('pelicula'));
    }

	public function getEdit($id)
    {
        // Obtener la película con el id proporcionado
        $pelicula = Pelis::find($id);  // Utilizamos find para buscar la película por su ID


        // Pasar el dato de la película a la vista
        return view('catalog.edit', [
            'pelicula' => $pelicula // Pasamos la película entera a la vista
        ]);
    }

    public function store(Request $request){
        if(!empty($request->title) && !empty($request->year) && !empty($request->director)){
           $p = new Pelis;
            $p -> title = $request->post('title');
            $p -> year = $request->post('year');
            $p -> director = $request->post('director');
            $p -> poster = $request->post('poster');
            $p -> synopsis = $request->post('sysnopsis');
            $p -> save();

        }
        return redirect()->route('catalogshow');
    }

    public function mstore(Request $request, $id)
{
    // Validar los datos del formulario
    if (!empty($request->title) && !empty($request->year) && !empty($request->director)) {

        // Buscar la película por el id (no es necesario usar un ternario aquí)
        $pelicula = Pelis::find($id);

        // Si no se encuentra la película, redirigir con un mensaje de error
        if (!$pelicula) {
            return redirect()->route('catalogshow')->with('error', 'Pelicula no encontrada');
        }

        // Asignar los valores del formulario a la película
        $pelicula->title = $request->post('title');
        $pelicula->year = $request->post('year');
        $pelicula->director = $request->post('director');
        $pelicula->poster = $request->post('poster');
        $pelicula->synopsis = $request->post('synopsis');

        // Guardar la película (ya sea nueva o modificada)
        $pelicula->save();
    }

    // Redirigir al catálogo
    return redirect()->route('catalogshow');
}


}
?>