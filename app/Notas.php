<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $fillable = ['contenido', 'id_incidencia', 'id_tripulante'];

    public function tripulante(){
        return $this->belongsTo(Tripulante::class, 'id_tripulante', 'id');
    }
}
