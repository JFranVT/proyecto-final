@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proveedores</h1>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Nuevo Proveedor</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->ID_Proveedor }}</td>
                <td>{{ $proveedor->Nombre }}</td>
                <td>{{ $proveedor->Contacto }}</td>
                <td>{{ $proveedor->Direccion }}</td>
                <td>
                    <a href="{{ route('proveedores.show', $proveedor->ID_Proveedor) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('proveedores.edit', $proveedor->ID_Proveedor) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('proveedores.destroy', $proveedor->ID_Proveedor) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('panel') }}" class="btn btn-secondary mt-3">Volver al Panel Principal</a>
</div>
@endsection