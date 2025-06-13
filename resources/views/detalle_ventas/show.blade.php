@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Venta</h1>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text"><strong>Venta:</strong> #{{ $detalle->ID_Venta }}</p>
            <p class="card-text"><strong>Producto:</strong> {{ $detalle->producto->Descripcion }}</p>
            <p class="card-text"><strong>Cantidad:</strong> {{ $detalle->Cantidad }}</p>
            <p class="card-text"><strong>Precio Unitario:</strong> Q{{ number_format($detalle->Precio_Unitario, 2) }}</p>
            <p class="card-text"><strong>Subtotal:</strong> Q{{ number_format($detalle->Cantidad * $detalle->Precio_Unitario, 2) }}</p>
        </div>
    </div>
    <a href="{{ route('detalle_ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection