@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Producto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->Descripcion }}</h5>
            <p class="card-text"><strong>Categoría:</strong> {{ $producto->Categoria }}</p>
            <p class="card-text"><strong>Precio:</strong> Q{{ number_format($producto->Precio, 2) }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $producto->Stock }}</p>
            <p class="card-text"><strong>Proveedor:</strong> {{ $producto->proveedor?->Nombre ?? '-' }}</p>
        </div>
    </div>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection