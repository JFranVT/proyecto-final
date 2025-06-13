@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre_Usuario" class="form-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="Nombre_Usuario" value="{{ old('Nombre_Usuario') }}" required>
        </div>
        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="Contrasena" required>
        </div>
        <div class="mb-3">
            <label for="Rol" class="form-label">Rol:</label>
            <select class="form-select" name="Rol">
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection