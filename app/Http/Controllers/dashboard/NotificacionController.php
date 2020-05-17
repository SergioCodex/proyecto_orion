<?php

namespace App\Http\Controllers\dashboard;

use App\Tripulante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function marcarLeido(){

        $tripulante = Tripulante::find(Auth::user()->id);
        $tripulante->unreadNotifications->markAsRead();

        return back();
    }
}
