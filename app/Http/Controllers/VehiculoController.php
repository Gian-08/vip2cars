<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente')->latest()->paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('vehiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'placa' => 'required|unique:vehiculos|max:10',
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'anio_fabricacion' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'cliente_id' => 'required|exists:clientes,id'
        ]);

        Vehiculo::create($validated);
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado exitosamente');
    }

    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();
        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $validated = $request->validate([
            'placa' => 'required|max:10|unique:vehiculos,placa,'.$vehiculo->id,
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'anio_fabricacion' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'cliente_id' => 'required|exists:clientes,id'
        ]);

        $vehiculo->update($validated);
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado exitosamente');
    }
}