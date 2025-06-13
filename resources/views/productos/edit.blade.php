@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->ID_Producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="Descripcion" value="{{ old('Descripcion', $producto->Descripcion) }}" required>
        </div>
        <div class="mb-3">
            <label for="Categoria" class="form-label">Categoría:</label>
            <input type="text" class="form-control" name="Categoria" value="{{ old('Categoria', $producto->Categoria) }}">
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" step="0.01" name="Precio" value="{{ old('Precio', $producto->Precio) }}" required>
        </div>
        <div class="mb-3">
            <label for="Stock" class="form-label">Stock:</label>
            <input type="number" class="form-control" name="Stock" value="{{ old('Stock', $producto->Stock) }}" required>
        </div>
        <div class="mb-3">
            <label for="ID_Proveedor" class="form-label">Proveedor:</label>
            <select class="form-select" name="ID_Proveedor" required>
                <option value="">Seleccione proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_Proveedor }}" {{ $producto->ID_Proveedor == $proveedor->ID_Proveedor ? 'selected' : '' }}>
                        {{ $proveedor->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection