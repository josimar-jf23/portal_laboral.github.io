<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    
    protected $fillable = [
        'nombre','tipo_doc','num_doc','telefono','localizacion','direccion', 'descripcion','ciudad_id','rubro_id', 'estado'
    ];
    
    public function users(){
        return $this->hasMany(User::class);
    }
    public function rubro(){
        return $this->belongsTo(Rubro::class);
    }
    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
