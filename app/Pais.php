<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    public $timestamps = false;
    protected $fillable = [
        'nombre','abrev'
    ];

    public function departamentos(){
        return $this->hasMany(Departamento::class);
    }
}
