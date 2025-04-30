<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'NumDoc' => 'required|unique:clientes|max:20',
            'telefono' => 'nullable|max:15',
            'email' => 'nullable|email|max:100',
            'direccion' => 'required|max:100'
        ]);

        Cliente::create($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'NumDoc' => 'required|max:20|unique:clientes,NumDoc,'.$cliente->id,
            'telefono' => 'nullable|max:15',
            'email' => 'nullable|email|max:100',
            'direccion' => 'required|max:100'
        ]);

        $cliente->update($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
    }
}