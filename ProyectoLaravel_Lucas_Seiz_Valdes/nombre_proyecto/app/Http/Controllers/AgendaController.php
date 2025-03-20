<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Imagen;
use App\Models\Persona;

class AgendaController extends Controller
{
    // Muestra el formulario para insertar una nueva entrada en la agenda (Ejercicio 2)
    public function create()
    {
        $personas = Persona::all();
        $imagenes = Imagen::all();
        return view('agenda.create', compact('personas', 'imagenes'));
    }

    // Procesa el formulario y almacena la nueva entrada en la agenda
    public function store(Request $request)
    {
        $request->validate([
            'fecha'   => 'required|date',
            'hora'    => 'required',
            'persona' => 'required|exists:personas,id',
            'imagen'  => 'required|exists:imagenes,idimagen'
        ]);

        $agenda = new Agenda();
        $agenda->fecha     = $request->fecha;
        $agenda->hora      = $request->hora;
        $agenda->idpersona = $request->persona;
        $agenda->idimagen  = $request->imagen;
        $agenda->save();

        return redirect()->back()->with('success', 'Entrada en la agenda creada correctamente.');
    }

    // Muestra el formulario para consultar la agenda de un día (Ejercicio 3)
    public function showForm()
    {
        $personas = Persona::all();
        return view('agenda.show', compact('personas'));
    }

    // Procesa la consulta y muestra la agenda para la persona y fecha seleccionadas
    public function showAgenda(Request $request)
    {
        $request->validate([
            'fecha'   => 'required|date',
            'persona' => 'required|exists:personas,id'
        ]);

        $personas = Persona::all();

        // Consulta recomendada por el enunciado
        $agenda = Agenda::select('imagenes.imagen', 'agenda.fecha', 'agenda.hora')
            ->join('imagenes', 'imagenes.idimagen', '=', 'agenda.idimagen')
            ->where('agenda.idpersona', $request->persona)
            ->where('agenda.fecha', $request->fecha)
            ->get();

        return view('agenda.show', compact('agenda', 'personas'));
    }
}
