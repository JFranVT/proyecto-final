@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Ventas</h1>
    <a href="{{ route('detalle_ventas.create') }}" class="btn btn-success mb-3">Agregar Detalle</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detalles as $detalle)
            <tr>
                <td>#{{ $detalle->ID_Venta }}</td>
                <td>{{ $detalle->producto->Descripcion }}</td>
                <td>{{ $detalle->Cantidad }}</td>
                <td>Q{{ number_format($detalle->Precio_Unitario, 2) }}</td>
                <td>Q{{ number_format($detalle->Cantidad * $detalle->Precio_Unitario, 2) }}</td>
                <td>
                    <a href="{{ route('detalle_ventas.show', $detalle->ID_Detalle) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('detalle_ventas.edit', $detalle->ID_Detalle) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('detalle_ventas.destroy', $detalle->ID_Detalle) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este detalle?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No hay detalles registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection