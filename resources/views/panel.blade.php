@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel Principal</h1>
    <div class="list-group">
        <a href="{{ route('productos.index') }}" class="list-group-item list-group-item-action">Productos</a>
        <a href="{{ route('clientes.index') }}" class="list-group-item list-group-item-action">Clientes</a>
        <a href="{{ route('proveedores.index') }}" class="list-group-item list-group-item-action">Proveedores</a>
        <a href="{{ route('almacenes.index') }}" class="list-group-item list-group-item-action">Almacenes</a>
        <a href="{{ route('ventas.index') }}" class="list-group-item list-group-item-action">Ventas</a>
        <a href="{{ route('detalle_ventas.index') }}" class="list-group-item list-group-item-action">Detalle de Ventas</a>
        <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">Usuarios</a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
    </form>
</div>
@endsection