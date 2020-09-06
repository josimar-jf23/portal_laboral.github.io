<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $fillable = [
        'nombre','descripcion', 'estado'
    ];

    public function empresas(){
        return $this->hasMany(Empresa::class);
    }
}
