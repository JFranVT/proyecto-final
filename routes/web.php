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
    Route::get('panel', function () {
        return view('panel');
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