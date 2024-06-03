<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;


class Prediccion extends Model
{
    protected $fillable = [
        'empresa_id',
    ];
    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }
}
