<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacen'; // O 'Almacen' según el nombre exacto en tu BD
    protected $primaryKey = 'ID_Almacen';
    public $timestamps = false;

    protected $fillable = [
        'Ubicacion',
        'Capacidad',
    ];
}
