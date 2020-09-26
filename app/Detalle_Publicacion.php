<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Publicacion extends Model
{
    protected $table='detalles_publicacion';

    protected $fillable = [
        'caracteristica','orden', 'publicacion_id'
    ];
    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }
}
