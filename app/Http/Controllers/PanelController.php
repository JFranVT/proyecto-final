<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Proveedor;

class PanelController extends Controller
{
    public function panel()
    {
        return view('panel', [
            'ventas' => Venta::count(),
            'productos' => Producto::count(),
            'clientes' => Cliente::count(),
            'proveedores' => Proveedor::count(),
        ]);
    }
}
