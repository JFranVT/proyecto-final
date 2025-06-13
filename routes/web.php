<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\PanelController;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Usuario;
use App\Models\Almacen;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación personalizadas
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Panel principal protegido
Route::middleware('auth')->group(function () {
    // Ruta principal del panel
    Route::get('panel', function () {
        $ventas = Venta::count();
        $productos = Producto::count();
        $clientes = Cliente::count();
        $proveedores = Proveedor::count();

        // Ventas del mes actual
        $ventasMes = Venta::whereMonth('Fecha', now()->month)
            ->whereYear('Fecha', now()->year)
            ->count();

        // Ingresos del mes actual
        $ingresosMes = Venta::whereMonth('Fecha', now()->month)
            ->whereYear('Fecha', now()->year)
            ->sum('Total');

        // Productos con bajo stock (menos de 5)
        $productosBajoStock = Producto::where('Stock', '<', 5)->count();

        // Últimas 5 ventas
        $ultimasVentas = Venta::orderBy('Fecha', 'desc')->take(5)->get();

        return view('panel', compact(
            'ventas', 'productos', 'clientes', 'proveedores',
            'ventasMes', 'ingresosMes', 'productosBajoStock', 'ultimasVentas'
        ));
    })->name('panel');

    Route::resource('proveedores', ProveedorController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('almacenes', AlmacenController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('detalle_ventas', DetalleVentaController::class);

    // Ruta para mostrar la factura de una venta
    Route::get('ventas/{venta}/factura', [VentaController::class, 'factura'])->name('ventas.factura');
    Route::get('ventas/{venta}/factura/preview', [VentaController::class, 'facturaPreview'])->name('ventas.factura.preview');
    Route::get('ventas/{venta}/factura/pdf', [VentaController::class, 'facturaPdf'])->name('ventas.factura.pdf');
});