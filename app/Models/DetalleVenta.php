<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta'; // O 'Detalle_Venta' según tu BD
    protected $primaryKey = 'ID_Detalle';
    public $timestamps = false;

    protected $fillable = [
        'ID_Venta',
        'ID_Producto',
        'Cantidad',
        'Precio_Unitario',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_Venta', 'ID_Venta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto', 'ID_Producto');
    }
}