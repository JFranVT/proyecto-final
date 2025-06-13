<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // <-- en plural
    protected $primaryKey = 'ID_Producto';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Categoria',
        'Precio',
        'Stock',
        'ID_Proveedor',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor', 'ID_Proveedor');
    }
}