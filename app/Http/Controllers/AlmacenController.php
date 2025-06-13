<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all();
        return view('almacenes.index', compact('almacenes'));
    }

    public function create()
    {
        return view('almacenes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Ubicacion' => 'required|string|max:150',
            'Capacidad' => 'required|integer|min:0',
        ]);

        Almacen::create($request->all());

        return redirect()->route('almacenes.index')->with('success', 'Almacén registrado correctamente.');
    }

    public function edit($id)
    {
        $almacen = Almacen::findOrFail($id);
        return view('almacenes.edit', compact('almacen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Ubicacion' => 'required|string|max:150',
            'Capacidad' => 'required|integer|min:0',
        ]);

        $almacen = Almacen::findOrFail($id);
        $almacen->update($request->all());

        return redirect()->route('almacenes.index')->with('success', 'Almacén actualizado correctamente.');
    }

    public function destroy($id)
    {
        $almacen = Almacen::findOrFail($id);
        $almacen->delete();

        return redirect()->route('almacenes.index')->with('success', 'Almacén eliminado correctamente.');
    }

    public function show($id)
    {
        $almacen = Almacen::findOrFail($id);
        return view('almacenes.show', compact('almacen'));
    }
}
