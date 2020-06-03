<?php

namespace App;

use App\RequisitosObjetivo;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'id_sector', 'id_requisitos', 'id_consumos', 'completado'];

    public function sector(){
        return $this->belongsTo(Sector::class, 'id_sector', 'id');
    }

    public function consumos_objetivo(){
        return $this->belongsTo(ConsumosObjetivo::class, 'id_consumos', 'id');
    }
}
