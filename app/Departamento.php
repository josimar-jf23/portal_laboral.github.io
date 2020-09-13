<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre','ubigeo', 'pais_id'
    ];

    public function ciudades(){
        return $this->hasMany(Ciudad::class);
    }
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
