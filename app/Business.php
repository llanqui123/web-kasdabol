<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'logo',
        'mail',
        'direccion',
        'ruc',
        'costo_pedido',
        'mantenimiento',
    ];
    
}
