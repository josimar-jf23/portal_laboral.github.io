<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    protected $table = 'suscriptores';
    protected $fillable = [
        'nombres','apellidos', 'dni','email','celular','publicacion_id'
    ];
    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }
}
