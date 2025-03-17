<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Persona;
use App\Models\Imagen;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $imagenes = Imagen::all();
        return view('agenda.create', compact('personas', 'imagenes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'persona' => 'required|exists:personas,id',
            'imagen' => 'required|exists:imagenes,idimagen'
        ]);

        Agenda::create($validated);

        return redirect()->route('agenda.create')->with('success', 'Entrada agregada correctamente.');
    }

    public function list(Request $request)
    {
        if ($request->has(['persona', 'fecha'])) {
            $agenda = DB::table('agenda')
                ->join('imagenes', 'imagenes.idimagen', '=', 'agenda.idimagen')
                ->select('imagenes.imagen', 'agenda.fecha', 'agenda.hora')
                ->where('agenda.idpersona', $request->persona)
                ->where('agenda.fecha', $request->fecha)
                ->get();
            return view('agenda.list', compact('agenda'));
        } else {
            $personas = Persona::all();
            return view('agenda.search', compact('personas'));
        }
    }
}
