<!-- As a heading -->

@php

use App\Tripulante;
$tripulante = Tripulante::find(Auth::user()->id)

@endphp

<nav class="navbar navbar-light bg-light shadow-sm"
    style="position: absolute; width: 100%; height: 75px; border-bottom: 1px solid rgb(235, 235, 235); z-index:10">
    <div class="row" style="width: 100%">
        <div class="col-1" style="margin-left: 100px">
            <span class="navbar-brand mb-0"> <i class="fa fa-user mr-2"></i> <span class="text-secondary">Hey,</span>
                {{Auth::user()->name}}</span>
        </div>
        @if (Auth::user()->id_rol > 1)
        <div class="col-4">
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item avatar dropdown">
                    <a class="nav-link waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        @if ($tripulante->unreadNotifications->count() > 0)
                        <span class="badge badge-danger ml-2">{{ $tripulante->unreadNotifications->count()}}</span>
                        @endif

                        <i class="fas fa-bell"></i>
                    </a>
                    <div class="dropdown-menu pd-2 dropdown-menu-lg-right dropdown-secondary"
                        aria-labelledby="navbarDropdownMenuLink-5">

                        @if ($tripulante->notifications->count() > 0)
                        <a class="btn btn-primary btn-block p-2 float-left mb-3"
                            href="{{ route('marcarleido')}}">Marcar todo como
                            leído</a>
                        @foreach ($tripulante->unreadNotifications->take(5) as $notification)
                        <a class="dropdown-item" style="background-color: #ffe7bf"
                            href="{{ route('objetivo.gestion', $notification->data['objetivo_id'])}}">{!!
                            $notification->data['data'] !!}</a>
                        @endforeach
                        @foreach ($tripulante->readNotifications->take(5) as $notification)
                        <a class="dropdown-item" style="background-color: #f1f1f1"
                            href="{{ route('objetivo.gestion', $notification->data['objetivo_id'])}}">{!!
                            $notification->data['data'] !!}</a>
                        @endforeach
                        @else
                        <div class="ml-3">No tienes notificaciones pendientes.</div>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>