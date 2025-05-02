<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\EstadoContrato;
use App\Models\Nicho;
use App\Models\Ocupante;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with(['estado', 'responsable', 'nicho'])->get();
        return view('contratos.index', compact('contratos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = EstadoContrato::all();
        $responsables = Responsable::all();
        $nichos = Nicho::all(); // O filtrados
        $ocupantes = Ocupante::all(); // O filtrados

        return view('contratos.create', compact('estados', 'responsables', 'nichos', 'ocupantes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_responsable' => 'required|exists:responsable,id',
            'id_nicho' => 'required|exists:nicho,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'monto' => 'nullable|numeric'
        ]);

        $data = $request->all();
        $data['creado_por'] = Auth::id();

        Contrato::create($data);

        return redirect()->route('contratos.index')->with('success', 'Contrato creado con éxito');
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
    public function edit($id)
{
    $contrato = Contrato::findOrFail($id);
    $estados = EstadoContrato::all();
    $responsables = Responsable::all();
    $nichos = Nicho::all();
    $ocupantes = Ocupante::all();

    return view('contratos.edit', compact('contrato', 'estados', 'responsables', 'nichos', 'ocupantes'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_estado_contrato' => 'required|exists:estado_contrato,id',
            'id_responsable' => 'required|exists:responsable,id',
            'id_nicho' => 'required|exists:nicho,id_nicho',
            'id_ocupante' => 'required|exists:ocupante,id_ocupante',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'monto' => 'nullable|numeric'
        ]);

        $contrato = Contrato::findOrFail($id);
        $contrato->update($request->all());

        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
