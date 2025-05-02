<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Municipio;
use App\Models\Nicho;
use App\Models\Ocupante;
use Illuminate\Http\Request;

class OcupanteController extends Controller
{
    public function index()
    {
        $ocupantes = Ocupante::with(['municipio', 'genero', 'nicho'])
                             ->where('estado', true)
                             ->get();

        return view('ocupante.index', compact('ocupantes'));
    }


    public function store(Request $request)
{
    // Validación de los datos
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'dpi' => 'required|string|max:20|unique:ocupante,dpi',
        'id_municipio' => 'required|exists:municipio,id',
        'fecha_fallecimiento' => 'required|date',
        'causa_muerte' => 'nullable|string|max:255',
        'id_genero' => 'required|exists:genero,id',
        'id_nicho' => 'required|exists:nicho,id',
        'personaje_historico' => 'required|boolean',
        'estado' => 'boolean',
    ]);

    // Crear el nuevo ocupante
    Ocupante::create($validated);

    // Redireccionar con mensaje
    return redirect()->route('ocupantes.index')->with('success', 'Ocupante creado exitosamente.');
}


    public function create()
    {
        $municipio = Municipio::all();
        $genero = Genero::all();
        $nicho = Nicho::all();

        return view('ocupante.create', compact('municipio', 'genero', 'nicho'));
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ocupante = Ocupante::findOrFail($id);
    $municipio = Municipio::all();
    $genero = Genero::all();
    $nicho = Nicho::all();

    return view('ocupante.edit', compact('ocupante', 'municipio', 'genero', 'nicho'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ocupante = Ocupante::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dpi' => 'required|string|max:20|unique:ocupante,dpi,' . $ocupante->id,
            'id_municipio' => 'required|exists:municipio,id',
            'fecha_fallecimiento' => 'required|date',
            'causa_muerte' => 'nullable|string|max:255',
            'id_genero' => 'required|exists:genero,id',
            'id_nicho' => 'required|exists:nicho,id',
            'personaje_historico' => 'required|boolean',
        ]);

        $ocupante->update($validated);

        return redirect()->route('ocupantes.index')->with('success', 'Ocupante actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ocupante = Ocupante::findOrFail($id);
        $ocupante->estado = false;
        $ocupante->save();

        return redirect()->route('ocupantes.index')->with('success', 'Ocupante eliminado correctamente.');
    }


}
