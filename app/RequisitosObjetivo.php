<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitosObjetivo extends Model
{
    protected $fillable = ['oxigeno', 'energia', 'combustible', 'agua', 'alimento', 'id_objetivo'];
}
