<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'Proveedor';
    protected $primaryKey = 'ID_Proveedor';
    public $timestamps = false; // Si tu tabla no tiene campos created_at y updated_at

    protected $fillable = [
        'Nombre',
        'Contacto',
        'Direccion'
    ];
}