<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'nombre','descripcion', 'empresa_id','subarea_id',
    ];
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }
    public function subarea(){
        return $this->belongsTo(SubArea::class);
    }
}
