@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel Principal</h1>
    <div class="row">
        <!-- Estadísticas principales -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Ventas totales</h5>
                    <p class="card-text display-6">{{ $ventas }}</p>
                    <a href="{{ route('ventas.index') }}" class="btn btn-light btn-sm">Ver ventas</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text display-6">{{ $productos }}</p>
                    <a href="{{ route('productos.index') }}" class="btn btn-light btn-sm">Ver productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text display-6">{{ $clientes }}</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm">Ver clientes</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Proveedores</h5>
                    <p class="card-text display-6">{{ $proveedores }}</p>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-light btn-sm">Ver proveedores</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas adicionales -->
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card border-info">
                <div class="card-body">
                    <h6 class="card-title">Ventas este mes</h6>
                    <p class="card-text display-6">{{ $ventasMes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-success">
                <div class="card-body">
                    <h6 class="card-title">Ingresos este mes</h6>
                    <p class="card-text display-6">Q{{ number_format($ingresosMes, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-danger">
                <div class="card-body">
                    <h6 class="card-title">Productos con bajo stock</h6>
                    <p class="card-text display-6">{{ $productosBajoStock }}</p>
                    <a href="{{ route('productos.index') }}" class="btn btn-danger btn-sm">Ver productos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimas ventas -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Últimas 5 ventas</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th># Venta</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimasVentas as $venta)
                    <tr>
                        <td>{{ $venta->ID_Venta }}</td>
                        <td>{{ $venta->cliente->Nombre ?? '-' }}</td>
                        <td>{{ $venta->Fecha }}</td>
                        <td>Q{{ number_format($venta->Total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botones de acceso rápido para Usuarios y Almacenes -->
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary btn-lg w-100">Usuarios</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('almacenes.index') }}" class="btn btn-dark btn-lg w-100">Almacenes</a>
        </div>
    </div>

@endsection