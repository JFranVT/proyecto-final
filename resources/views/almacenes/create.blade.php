@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Almacén</h1>
    <form action="{{ route('almacenes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Ubicacion" class="form-label">Ubicación:</label>
            <input type="text" class="form-control" name="Ubicacion" value="{{ old('Ubicacion') }}" required>
        </div>
        <div class="mb-3">
            <label for="Capacidad" class="form-label">Capacidad:</label>
            <input type="number" class="form-control" name="Capacidad" value="{{ old('Capacidad') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('almacenes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection