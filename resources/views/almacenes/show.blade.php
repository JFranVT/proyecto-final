@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Almacén</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ubicación: {{ $almacen->Ubicacion }}</h5>
            <p class="card-text"><strong>Capacidad:</strong> {{ $almacen->Capacidad }}</p>
        </div>
    </div>
    <a href="{{ route('almacenes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection