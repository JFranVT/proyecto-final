@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Venta</h1>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Cliente: {{ $venta->cliente->Nombre }}</h5>
            <p class="card-text"><strong>Fecha:</strong> {{ $venta->Fecha }}</p>
            <p class="card-text"><strong>Total:</strong> Q{{ number_format($venta->Total, 2) }}</p>
        </div>
    </div>
    <h5>Productos vendidos</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $detalle)
            <tr>
                <td>{{ $detalle->producto->Descripcion }}</td>
                <td>{{ $detalle->Cantidad }}</td>
                <td>Q{{ number_format($detalle->Precio_Unitario, 2) }}</td>
                <td>Q{{ number_format($detalle->Cantidad * $detalle->Precio_Unitario, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection