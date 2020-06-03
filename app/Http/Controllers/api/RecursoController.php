<?php

namespace App\Http\Controllers\api;

use App\ConsumosObjetivo;
use App\Recurso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\ApiResponseController;

class RecursoController extends ApiResponseController
{
    public function consumos()
    {

        $consumos = ConsumosObjetivo::join('objetivos', 'consumos_objetivos.id_objetivo', '=', 'objetivos.id')->where('objetivos.completado', '0')->get();
        $recursos = Recurso::get();

        //$oxigeno = Recurso::select('oxigeno');
        return $this->successResponse([$consumos, $recursos]);
    }
}
