<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'proveedor_id', 'usuario_id','fecha_compra', 'tax','total','estado',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    public function detalleCompras(){
        return $this->hasMany(DetalleCompra::class);
    }
}
