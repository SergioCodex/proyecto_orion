@extends('dashboard.master')

@section('title')
Panel de Usuario
@endsection

@section('content')

<div class="row mt-5">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success text-center ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-2">
    <table class="table table-striped table-inverse table-bordered">
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
                <td style="font-family: 'Roboto Condensed', sans-serif;">{{ $tarea["tarea"]}}</td>
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