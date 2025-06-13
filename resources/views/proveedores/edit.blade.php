@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proveedores.update', $proveedor->ID_Proveedor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ $proveedor->Nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="Contacto" class="form-label">Contacto</label>
            <input type="text" name="Contacto" class="form-control" value="{{ $proveedor->Contacto }}" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" name="Direccion" class="form-control" value="{{ $proveedor->Direccion }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection