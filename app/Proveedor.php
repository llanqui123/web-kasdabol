<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre', 'email','ruc_numero', 'direccion','telefono',
    ];
    
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
