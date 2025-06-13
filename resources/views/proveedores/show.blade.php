@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Proveedor</h1>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $proveedor->Nombre }}</h5>
            <p class="card-text"><strong>Contacto:</strong> {{ $proveedor->Contacto }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $proveedor->Direccion }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $proveedor->Telefono ?? 'No registrado' }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $proveedor->Email ?? 'No registrado' }}</p>
        </div>
    </div>
    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver a Proveedores</a>
</div>
@endsection