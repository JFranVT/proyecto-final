<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('proveedor')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('productos.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'Categoria' => 'nullable|string',
            'Precio' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'ID_Proveedor' => 'required|exists:proveedor,ID_Proveedor',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $proveedores = \App\Models\Proveedor::all();
        return view('productos.edit', compact('producto', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'Categoria' => 'nullable|string',
            'Precio' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'ID_Proveedor' => 'required|exists:proveedor,ID_Proveedor',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::with('proveedor')->findOrFail($id);
        return view('productos.show', compact('producto'));
    }
}