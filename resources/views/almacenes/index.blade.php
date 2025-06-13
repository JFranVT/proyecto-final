@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Almacenes</h1>
    <a href="{{ route('almacenes.create') }}" class="btn btn-success mb-3">Registrar Almacén</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ubicación</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($almacenes as $almacen)
            <tr>
                <td>{{ $almacen->Ubicacion }}</td>
                <td>{{ $almacen->Capacidad }}</td>
                <td>
                    <a href="{{ route('almacenes.show', $almacen->ID_Almacen) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('almacenes.edit', $almacen->ID_Almacen) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('almacenes.destroy', $almacen->ID_Almacen) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este almacén?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No hay almacenes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection