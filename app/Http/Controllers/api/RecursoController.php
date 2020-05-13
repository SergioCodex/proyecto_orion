<?php

namespace App\Http\Controllers\api;

use App\Recurso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\ApiResponseController;

class RecursoController extends ApiResponseController
{
    public function oxigeno_total()
    {
        $oxigeno = Recurso::select('oxigeno');
        return $this->successResponse($oxigeno);
    }
}
