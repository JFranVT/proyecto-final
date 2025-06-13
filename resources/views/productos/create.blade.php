@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="Descripcion" required>
        </div>
        <div class="mb-3">
            <label for="Categoria" class="form-label">Categoría</label>
            <input type="text" class="form-control" name="Categoria" required>
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="Precio" min="0" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="Stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="Stock" min="0" required>
        </div>
        <div class="mb-3">
            <label for="ID_Proveedor" class="form-label">Proveedor</label>
            <select class="form-select" name="ID_Proveedor" required>
                <option value="">Seleccione proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_Proveedor }}">{{ $proveedor->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection