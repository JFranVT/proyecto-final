@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="mb-3">
            <label for="Contacto" class="form-label">Contacto:</label>
            <input type="text" class="form-control" name="Contacto" value="{{ old('Contacto') }}">
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="Direccion" value="{{ old('Direccion') }}">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection