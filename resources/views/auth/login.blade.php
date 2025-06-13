@extends('layouts.app')

@section('content')
<div class="container" style="max-width:400px;">
    <h2 class="mb-4">Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="Nombre_Usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="Nombre_Usuario" required autofocus>
        </div>
        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="Contrasena" required>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>
@endsection
