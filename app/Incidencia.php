<?php

namespace App;

use App\Tripulante;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = ['status', 'id_comunicador', 'id_sector_origen', 'titulo', 'descripcion', 'id_agente'];

    public function tripulante(){
        return $this->belongsTo(Tripulante::class, 'id_comunicador', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector_origen', 'id');
    }

    public function agente(){
        return $this->belongsTo(Tripulante::class, 'id_agente', 'id');
    }

    public function notas(){
        return $this->hasMany(Notas::class, 'id_incidencia', 'id');
    }

    public function mensajes_incidencias(){
        return $this->hasMany(MensajeIncidencia::class, 'id_incidencia', 'id');
    }
}
