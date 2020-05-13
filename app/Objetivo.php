<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'id_sector', 'id_requisitos'];

    public function sector(){
        return $this->belongsTo(Sector::class, 'id_sector', 'id');
    }
}
