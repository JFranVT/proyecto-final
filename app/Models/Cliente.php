<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente'; // O 'Cliente' según el nombre exacto en tu BD
    protected $primaryKey = 'ID_Cliente';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Contacto',
        'Direccion',
    ];
}
