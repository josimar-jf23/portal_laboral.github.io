<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'nombre','email', 'celular','empresa_id',
    ];
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }
}
