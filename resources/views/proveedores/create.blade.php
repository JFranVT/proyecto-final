@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Proveedor</h1>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Contacto" class="form-label">Contacto</label>
            <input type="text" name="Contacto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" name="Direccion" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection