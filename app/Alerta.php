<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $fillable = ['recurso', 'mensaje', 'id_sector', 'id_objetivo'];

    public function sector(){
        return $this->belongsTo(Sector::class, 'id_sector', 'id');
    }
}
