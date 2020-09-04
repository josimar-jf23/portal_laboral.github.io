<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'estado'
    ];
    
    public function users(){
        return $this->belongsTo("App\User");
    }
}
