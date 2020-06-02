@extends('dashboard.master')

@section('title')
Panel de Usuario
@endsection

@section('content')

<div class="row" style="margin-top: 70px">
    @include('dashboard.partials.tarjeta-datos', ['titulo' => $n_dias, 'cuerpo' => 'Días con nosotros', 'icon' =>
    'clipboard-list', 'color' => 'azul'])
    @include('dashboard.partials.tarjeta-datos', ['titulo' => $n_incidencias, 'cuerpo' => 'Incidencias reportadas', 'icon'
    =>
    'comment-dots', 'color' => 'text-secondary'])
    @include('dashboard.partials.tarjeta-datos', ['titulo' => $tripulante->rol->nombre, 'cuerpo' => 'Tu puesto', 'icon' =>
    'wrench', 'color' => 'text-success'])
    <div class="col-3">
        <div class="tarjeta shadow-sm" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <h3 style="margin-bottom: -10px; margin-top: -5px;">{{ $tripulante->sector->nombre }}
                            </h3>
                            <small>Tu sector</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-warehouse float-right"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success text-center ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-2 shadow">
    <table class="table table-striped table-inverse table-bordered ">
        <thead class="thead-inverse">
            <tr style="font-family: 'Baloo Chettan 2', cursive;">
                <th width="125">Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendario_ordenado as $tiempo => $tareas)
            <tr>
                <td style="font-family: 'Unica One', cursive;" scope="row" class="text-center">{{ $tiempo }}</td>
                @foreach ($tareas as $tarea)


                @if ($tarea["tarea"] != 1)
                <td style="font-family: 'Roboto Condensed', sans-serif;" class="table-info">{{ $tarea["tarea"]}}</td>
                @elseif($tarea["tarea"] == 1)
                <td></td>
                @endif

                @endforeach

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection