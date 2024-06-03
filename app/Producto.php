<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'codigo', 'nombre', 'stock','precio_venta', 'estado', 'id_categoria','id_proveedor',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

}
