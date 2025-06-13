<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalles = DetalleVenta::with(['venta', 'producto'])->get();
        return view('detalle_ventas.index', compact('detalles'));
    }

    public function create()
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_ventas.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Venta' => 'required|exists:venta,ID_Venta',
            'ID_Producto' => 'required|exists:productos,ID_Producto', // <--- aquí
            'Cantidad' => 'required|integer|min:1',
            'Precio_Unitario' => 'required|numeric|min:0',
        ]);

        DetalleVenta::create($request->all());

        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta registrado correctamente.');
    }
   

    public function show($id)
    {
        $detalle = DetalleVenta::with(['venta', 'producto'])->findOrFail($id);
        return view('detalle_ventas.show', compact('detalle'));
    }

    public function edit($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_ventas.edit', compact('detalle', 'ventas', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Venta' => 'required|exists:venta,ID_Venta',
            'ID_Producto' => 'required|exists:productos,ID_Producto', // <--- aquí
            'Cantidad' => 'required|integer|min:1',
            'Precio_Unitario' => 'required|numeric|min:0',
        ]);

        $detalle = DetalleVenta::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta actualizado correctamente.');
    }

    public function destroy($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $detalle->delete();

        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta eliminado correctamente.');
    }
}
