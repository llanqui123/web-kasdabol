<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $fillable = [
        'compra_id', 'producto_id','cantidad', 'precio',
    ];

    public function compra(){
        return $this->belongsTo(Compra::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
