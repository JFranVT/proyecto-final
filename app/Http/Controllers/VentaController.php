<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Cliente' => 'required|exists:cliente,ID_Cliente',
            'Fecha' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*.ID_Producto' => 'required|exists:productos,ID_Producto',
            'productos.*.Cantidad' => 'required|integer|min:1',
            'productos.*.Precio_Unitario' => 'required|numeric|min:0',
        ]);

        // Validar stock antes de registrar la venta
        foreach ($request->productos as $detalle) {
            $producto = Producto::find($detalle['ID_Producto']);
            if (!$producto || $producto->Stock < $detalle['Cantidad']) {
                return back()->withErrors(['stock' => 'No hay suficiente stock para el producto: ' . ($producto->Descripcion ?? 'Desconocido')])->withInput();
            }
        }

        // Calcular el total de la venta
        $total = 0;
        foreach ($request->productos as $detalle) {
            $total += $detalle['Cantidad'] * $detalle['Precio_Unitario'];
        }

        // Crear la venta
        $venta = Venta::create([
            'ID_Cliente' => $request->ID_Cliente,
            'Fecha' => $request->Fecha,
            'Total' => $total,
        ]);

        // Crear los detalles de venta y descontar stock
        foreach ($request->productos as $detalle) {
            DetalleVenta::create([
                'ID_Venta' => $venta->ID_Venta,
                'ID_Producto' => $detalle['ID_Producto'],
                'Cantidad' => $detalle['Cantidad'],
                'Precio_Unitario' => $detalle['Precio_Unitario'],
            ]);

            // Descontar stock del producto
            $producto = Producto::find($detalle['ID_Producto']);
            $producto->Stock -= $detalle['Cantidad'];
            $producto->save();
        }

        // Redirigir a la factura
        return redirect()->route('ventas.factura.preview', $venta->ID_Venta);
    }

    public function show($id)
    {
        $venta = Venta::with(['cliente', 'detalles.producto'])->findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function factura($id)
    {
        $venta = Venta::with(['cliente', 'detalles.producto'])->findOrFail($id);
        return view('ventas.factura', compact('venta'));
    }

    public function facturaPreview($id)
    {
        $venta = Venta::with(['cliente', 'detalles.producto'])->findOrFail($id);
        return view('ventas.factura_pdf', compact('venta'));
    }

    public function facturaPdf($id)
    {
        $venta = Venta::with(['cliente', 'detalles.producto'])->findOrFail($id);
        $pdf = Pdf::loadView('ventas.factura_pdf', compact('venta'));
        return $pdf->download('factura_'.$venta->ID_Venta.'.pdf');
    }
}
