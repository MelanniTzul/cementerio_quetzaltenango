<?php

namespace App\Http\Controllers;

use App\Models\Avenida;
use App\Models\Calle;
use App\Models\EstadoNicho;
use App\Models\Nicho;
use App\Models\TipoNicho;
use Illuminate\Http\Request;

class NichoController extends Controller
{
    // Mostrar todos los nichos

    public function index()
{
    $nichos = Nicho::with(['tipo', 'calle', 'avenida', 'estado'])->get();
    return view('nichos.index', compact('nichos'));
}


    // Mostrar formulario de creación
    public function create()
    {
        $tipoNicho = TipoNicho::all();
        $calles = Calle::all();
        $avenidas = Avenida::all();
        $estadosNicho = EstadoNicho::all();
        //ver la otra vista nichos.create
        return view('nichos.create', compact('tipoNicho', 'calles', 'avenidas', 'estadosNicho'));
    }

    // Almacenar un nuevo nicho
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:nicho,codigo',
            'id_tipo' => 'required|integer',
            'id_calle' => 'required|integer',
            'id_avenida' => 'required|integer',
        ]);

        Nicho::create($request->all());

        return redirect()->route('nichos.index')->with('success', 'Nicho creado exitosamente.');
    }

    public function edit(Nicho $nicho)
{
    $tipoNicho = TipoNicho::all();
    $calles = Calle::all();
    $avenidas = Avenida::all();
    $estadosNicho = EstadoNicho::all();

    return view('nichos.edit', compact('nicho', 'tipoNicho', 'calles', 'avenidas', 'estadosNicho'));
}


public function update(Request $request, Nicho $nicho)
{
    $request->validate([
        'id_tipo' => 'required|integer',
        'id_calle' => 'required|integer',
        'id_avenida' => 'required|integer',
    ]);

    $nicho->update($request->all());

    return redirect()->route('nichos.index')->with('success', 'Nicho actualizado correctamente.');
}

}
