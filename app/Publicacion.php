<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table='publicaciones';

    protected $fillable = [
        'adicional','fecha_convocatoria', 'vacantes','sueldo','estado','empresa_id','puesto_id','contacto_id',
    ];

    public function detalle_publicaciones(){
        return $this->hasMany(Detalle_Publicacion::class);
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }
    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }
    public function suscriptores(){
        return $this->hasMany(Suscriptor::class);
    }
}
