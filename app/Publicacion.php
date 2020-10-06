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
    public function visitantes(){
        return $this->hasMany(Visitante::class);
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
    public function scopeMes_convocatoria($query,$mes_convocatoria){
        //dd($fecha_convocatoria2);
        if($mes_convocatoria){
            return $query->whereMonth('fecha_convocatoria','=',$mes_convocatoria);
        }
    }
    public function scopeAnio_convocatoria($query,$anio_convocatoria){
        //dd($fecha_convocatoria2);
        if($anio_convocatoria){
            return $query->whereYear('fecha_convocatoria','=',$anio_convocatoria);
        }
    }
    
}
