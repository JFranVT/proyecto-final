@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Usuario</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $usuario->Nombre_Usuario }}</h5>
            <p class="card-text"><strong>Rol:</strong> {{ $usuario->Rol }}</p>
        </div>
    </div>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection