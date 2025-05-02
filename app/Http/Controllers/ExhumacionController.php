<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhumacion;
use App\Models\Ocupante;


class ExhumacionController extends Controller
{
    public function index()
    {
        $exhumaciones = Exhumacion::with('ocupante.nicho')
                                  ->where('estado', true)
                                  ->get();

        return view('exhumacion.index', compact('exhumaciones'));
    }



    public function create()
{
    $ocupantes = Ocupante::where('estado', 1)
                         ->where('personaje_historico', 0)
                         ->get(); // Solo activos y no históricos

    return view('exhumacion.create', compact('ocupantes'));
}


    public function store(Request $request)
    {
        $request->validate([
            'solicitante'       => 'required|string|max:255',
            'id_ocupante'       => 'required|exists:ocupante,id',
            'fecha_exhumacion'  => 'required|date',
            'motivo'            => 'required|string|max:255',
            'observaciones'     => 'nullable|string',
        ]);

        $ocupante = Ocupante::findOrFail($request->id_ocupante);

        if ($ocupante->personaje_historico) {
            return back()->with('error', 'No se puede exhumar a un personaje histórico.');
        }

        Exhumacion::create([
            'solicitante'       => $request->solicitante,
            'id_ocupante'       => $request->id_ocupante,
            'fecha_solicitud'   => now(), // se guarda automáticamente
            'motivo'            => $request->motivo,
            'observaciones'     => $request->observaciones,
        ]);

        return redirect()->route('exhumacion.index')->with('success', 'Exhumación registrada correctamente.');
    }

    public function edit($id)
    {
        $exhumacion = Exhumacion::findOrFail($id);
        $ocupantes = Ocupante::where('estado', 1)
                             ->where('personaje_historico', 0)
                             ->get();

        return view('exhumacion.edit', compact('exhumacion', 'ocupantes'));
    }

    public function destroy($id)
{
    $exhumacion = Exhumacion::findOrFail($id);
    $exhumacion->estado = false;
    $exhumacion->save();

    return redirect()->route('exhumacion.index')->with('success', 'Exhumación eliminada correctamente.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'solicitante'       => 'required|string|max:255',
        'id_ocupante'       => 'required|exists:ocupante,id',
        'fecha_solicitud'  => 'required|date',
        'motivo'            => 'required|string|max:255',
    ]);

    $exhumacion = Exhumacion::findOrFail($id);
    $ocupante = Ocupante::findOrFail($request->id_ocupante);

    if ($ocupante->personaje_historico) {
        return back()->with('error', 'No se puede asignar un personaje histórico a una exhumación.');
    }

    $exhumacion->update([
        'solicitante'       => $request->solicitante,
        'id_ocupante'       => $request->id_ocupante,
        'fecha_solicitud'  => $request->fecha_solicitud,
        'motivo'            => $request->motivo,
    ]);

    return redirect()->route('exhumacion.index')->with('success', 'Exhumación actualizada correctamente.');
}



}
