<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta'; // O 'Venta' según tu BD
    protected $primaryKey = 'ID_Venta';
    public $timestamps = false;

    protected $fillable = [
        'ID_Cliente',
        'Fecha',
        'Total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente', 'ID_Cliente');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Venta', 'ID_Venta');
    }
    
}