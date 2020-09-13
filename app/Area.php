<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre','descripcion',
    ];
    public function subareas(){
        return $this->hasMany(SubArea::class);
    }
}
