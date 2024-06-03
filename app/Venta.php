<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'cliente_id', 'usuario_id','fecha_venta', 'tax','total','estado',
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function detalleVentas(){
        return $this->hasMany(DetalleVenta::class);
    }
}
