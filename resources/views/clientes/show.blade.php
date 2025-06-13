@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->Nombre }}</h5>
            <p class="card-text"><strong>Contacto:</strong> {{ $cliente->Contacto }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $cliente->Direccion }}</p>
        </div>
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection