<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_Usuario' => 'required|string|max:50|unique:usuario,Nombre_Usuario',
            'Contrasena' => 'required|string|max:100',
            'Rol' => 'nullable|string|max:20',
        ]);

        // Puedes encriptar la contraseña si lo deseas:
        // $request['Contrasena'] = bcrypt($request->Contrasena);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_Usuario' => 'required|string|max:50|unique:usuario,Nombre_Usuario,'.$id.',ID_Usuario',
            'Contrasena' => 'required|string|max:100',
            'Rol' => 'nullable|string|max:20',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }
}
