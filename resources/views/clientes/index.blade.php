@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">Registrar Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
            <tr>
                <td>{{ $cliente->Nombre }}</td>
                <td>{{ $cliente->Contacto }}</td>
                <td>{{ $cliente->Direccion }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente->ID_Cliente) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->ID_Cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->ID_Cliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No hay clientes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Si usas paginación en el controlador, descomenta la siguiente línea --}}
    {{-- {{ $clientes->links() }} --}}
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection