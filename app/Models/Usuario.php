<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario'; // O 'Usuario' según el nombre exacto en tu BD
    protected $primaryKey = 'ID_Usuario';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Usuario',
        'Contrasena',
        'Rol',
    ];

    // Indica a Laravel qué campo es la contraseña
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
