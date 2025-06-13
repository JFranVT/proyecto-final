@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->ID_Usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre_Usuario" class="form-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="Nombre_Usuario" value="{{ old('Nombre_Usuario', $usuario->Nombre_Usuario) }}" required>
        </div>
        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="Contrasena" value="{{ old('Contrasena', $usuario->Contrasena) }}" required>
        </div>
        <div class="mb-3">
            <label for="Rol" class="form-label">Rol:</label>
            <select class="form-select" name="Rol">
                <option value="Administrador" {{ $usuario->Rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Usuario" {{ $usuario->Rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection