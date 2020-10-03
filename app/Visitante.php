<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $fillable = [
        'contador','publicacion_id'
    ];
    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }
}
