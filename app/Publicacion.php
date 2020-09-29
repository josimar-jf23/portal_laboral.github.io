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
    public function scopePuesto_id($query,$puesto_id){
        if($puesto_id){
            return $query->where('puesto_id','=',$puesto_id);
        }
    }
    public function scopeEmpresa_id($query,$empresa_id){
        if($empresa_id){
            return $query->where('empresa_id','=',$empresa_id);
        }
    }
    public function scopeFecha_convocatoria($query,$fecha_convocatoria){
        if($fecha_convocatoria){
            return $query->where('fecha_convocatoria','=',$fecha_convocatoria);
        }
    }
}
