@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Detalle de Venta</h1>
    <form action="{{ route('detalle_ventas.update', $detalle->ID_Detalle) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ID_Venta" class="form-label">Venta:</label>
            <select class="form-select" name="ID_Venta" required>
                @foreach($ventas as $venta)
                    <option value="{{ $venta->ID_Venta }}" {{ $detalle->ID_Venta == $venta->ID_Venta ? 'selected' : '' }}>
                        #{{ $venta->ID_Venta }} - {{ $venta->cliente->Nombre ?? 'Sin cliente' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Producto" class="form-label">Producto:</label>
            <select class="form-select" name="ID_Producto" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ID_Producto }}" {{ $detalle->ID_Producto == $producto->ID_Producto ? 'selected' : '' }}>
                        {{ $producto->Descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Cantidad" class="form-label">Cantidad:</label>
            <input type="number" class="form-control" name="Cantidad" min="1" value="{{ old('Cantidad', $detalle->Cantidad) }}" required>
        </div>
        <div class="mb-3">
            <label for="Precio_Unitario" class="form-label">Precio Unitario:</label>
            <input type="number" class="form-control" name="Precio_Unitario" min="0" step="0.01" value="{{ old('Precio_Unitario', $detalle->Precio_Unitario) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('detalle_ventas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection