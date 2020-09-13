<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    protected $fillable = [
        'nombre','descripcion', 'area_id'
    ];
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function puestos(){
        return $this->hasMany(Puesto::class);
    }
}
