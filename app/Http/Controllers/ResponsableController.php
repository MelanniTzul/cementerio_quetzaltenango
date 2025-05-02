<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsables = Responsable::with('municipio')->get();
    return view('responsable.index', compact('responsables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    $municipios = Municipio::all();
    return view('responsable.create', compact('municipios'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'        => 'required|string|max:255',
            'apellido'      => 'required|string|max:255',
            'dpi'           => 'required|string|max:13|unique:responsable,dpi',
            'direccion'     => 'nullable|string|max:255',
            'telefono'      => 'nullable|string|max:20',
            'correo'        => 'nullable|email|max:255',
            'id_municipio'  => 'required|exists:municipio,id',
        ]);

        Responsable::create($validated);

        return redirect()->route('responsables.index')
                         ->with('success', 'Responsable creado exitosamente.');
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre'        => 'required|string|max:255',
            'apellido'      => 'required|string|max:255',
            'dpi'           => 'required|string|max:13|unique:responsable,dpi,' . $id,
            'direccion'     => 'nullable|string|max:255',
            'telefono'      => 'nullable|string|max:20',
            'correo'        => 'nullable|email|max:255',
            'id_municipio'  => 'required|exists:municipio,id',
        ]);

        $responsable = Responsable::findOrFail($id);
        $responsable->update($validated);

        return redirect()->route('responsables.index')->with('success', 'Responsable actualizado correctamente.');
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
        $responsable = Responsable::findOrFail($id);
        $municipios = Municipio::all();

        return view('responsable.edit', compact('responsable', 'municipios'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
