@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Registrar Producto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->Descripcion }}</td>
                <td>{{ $producto->Categoria }}</td>
                <td>{{ $producto->Precio }}</td>
                <td>{{ $producto->Stock }}</td>
                <td>{{ $producto->proveedor?->Nombre ?? '-' }}</td>
                <td>
                    <a href="{{ route('productos.show', $producto->ID_Producto) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('productos.edit', $producto->ID_Producto) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->ID_Producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection