@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-success mb-3">Registrar Venta</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
            <tr>
                <td>{{ $venta->cliente->Nombre }}</td>
                <td>{{ $venta->Fecha }}</td>
                <td>Q{{ number_format($venta->Total, 2) }}</td>
                <td>
                    <a href="{{ route('ventas.show', $venta->ID_Venta) }}" class="btn btn-info btn-sm">Ver</a>
                    {{-- Puedes agregar editar/eliminar si lo necesitas --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No hay ventas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection