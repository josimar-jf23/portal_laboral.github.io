<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    public $timestamps = false;
    protected $fillable = [
        'nombre','ubigeo', 'departamento_id'
    ];

    public function empresas(){
        return $this->hasMany(Empresa::class);
    }
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
