@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Registrar Usuario</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->Nombre_Usuario }}</td>
                <td>{{ $usuario->Rol }}</td>
                <td>
                    <a href="{{ route('usuarios.show', $usuario->ID_Usuario) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('usuarios.edit', $usuario->ID_Usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->ID_Usuario) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No hay usuarios registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection