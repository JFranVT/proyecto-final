@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->ID_Cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="Nombre" value="{{ old('Nombre', $cliente->Nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="Contacto" class="form-label">Contacto:</label>
            <input type="text" class="form-control" name="Contacto" value="{{ old('Contacto', $cliente->Contacto) }}">
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="Direccion" value="{{ old('Direccion', $cliente->Direccion) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection