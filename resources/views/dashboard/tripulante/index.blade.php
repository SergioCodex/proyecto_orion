@extends('dashboard.master')

@section('title')
Dashboard [Tripulante]
@endsection

@section('content')
<div class="row mt-4"></div>
<div class="row justify-content-end mt-5">
    <div class="col-3">
        <h2 class="mb-4 ml-">Nº tripulantes/mes <i class="fa fa-user-astronaut ml-3"></i></h2>
    </div>
    <div class="col-3">
        @include('dashboard.partials.success-action')
        @if (session('status'))
        <div class="alert alert-success text-center ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-lg btn-block shadow-sm text-light" style="margin-top: " data-toggle="modal"
            data-target="#creacion"> <i class="fa fa-plus mr-1"></i> Registrar
            Tripulante</button>
    </div>
</div>
<div class="row justify-content-end">
    <div class="tarjeta shadow-sm" style="padding: 15px; margin-right:10px">
        <canvas id="graficoBarra" width="700" height="300"></canvas>
    </div>
    <div class="col-3" style="margin-top: 50px">
        <div class="tarjeta shadow-sm" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_tripulantes }}
                            </h2>
                            <small>Número de tripulantes</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-user-astronaut float-right azul"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tarjeta shadow-sm mt-3" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_operarios }}
                            </h2>
                            <small>Número de operarios</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-briefcase float-right azul"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block mt-3 shadow-sm">Botón</button>
    </div>
    <div class="col-3" style="margin-top: 50px">
        <div class="tarjeta shadow-sm" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_superiores }}
                            </h2>
                            <small>Número de superiores</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-user-tie float-right azul"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tarjeta shadow-sm mt-3" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $capitan->name }}
                            </h2>
                            <small>Capitán</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-address-card float-right azul"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block mt-3 shadow-sm">Botón</button>
    </div>
</div>
{{-- <div class="row mt-4">
    <div class="ml-5 col-7">
        <h3 class="">Datos</h3>
    </div>
    <div class="ml-5 col-auto">
        <h3 class="">Número de afiliaciones/mes</h3>
    </div>
</div>
<div class="row justify-content-start">
    <div class="tarjeta shadow-sm p-4 col-7 ml-5">
        {!! $chart->container() !!}
    </div>
    <div class="tarjeta shadow-sm p-3 col-auto ml-5">
        <canvas id="graficoBarra" width="400" height="400"></canvas>
    </div>
</div> --}}

<div class="row">
    <div class="col-12 mt-4">
        <div class="">
            <div class="col-3">
                <h2 class="mb-4">Tripulantes <i class="fa fa-user-astronaut ml-3"></i></h2>
            </div>
            <table class="table table-hover table-bordered shadow-sm"
                style="padding: 20px !important; font-family: 'Fira Sans Condensed', sans-serif; font-size: 17px;">
                <thead>
                    <tr>
                        <th>ID <i class="fa fa-id-card ml-1"></i></th>
                        <th>Nombre <i class="fa fa-signature ml-1"></i></th>
                        <th>Rol <i class="fa fa-wrench ml-1"></i></th>
                        <th>Sector <i class="fa fa-warehouse ml-1"></i></th>
                        <th>Email <i class="fa fa-envelope ml-1"></i></th>
                        <th>Acciones <i class="fa fa-desktop ml-1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tripulantes as $tripulante)
                    <tr class="">
                        <td class="font-italic">#{{ $tripulante->id }}</td>
                        <td>{{ $tripulante->name }}</td>
                        <td>{{ $tripulante->rol->nombre }}</td>
                        <td>{{ $tripulante->sector->nombre }}</td>
                        <td>{{ $tripulante->email }}</td>
                        <td style="width: 127px"><button class="btn btn-primary btn-sm showTrip"
                                data-name="{{ $tripulante->name }}" data-apellido="{{ $tripulante->apellidos }}"
                                data-email="{{ $tripulante->email }}" data-rol="{{ $tripulante->rol->nombre }}"
                                data-sector="{{ $tripulante->sector->nombre }}"><i class="fa fa-eye"></i></button>
                            <a href="{{ route('tripulante.edit', $tripulante->id)}}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $tripulante->id }}"
                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $tripulantes->links() }}
        </div>


        @include('dashboard.tripulante.create') {{-- No muestra el error de email duplicado --}}
        @include('dashboard.tripulante.show')
        @include('dashboard.tripulante.destroy')
    </div>
</div>

<script type="application/javascript">
    window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        action = $('#formDelete').attr('data-action').slice(0, -1);
        //console.log(action+id);

        $('#formDelete').attr('action', action + id)
        var modal = $(this)
        modal.find('.modal-title').text('Eliminar tripulante: ' + id)
    });

    fetch('/api/tripulante/mes')
        .then(resp => resp.json())
        .then(json => {
            var mayo = json.data[0];
            var junio = json.data[1];

            var optionsBar = {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]   
                }
            };
            
            var dataBar = {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [
                {
                    label: "Tripulantes",
                    hoverBackgroundColor: '#98FFC5FF',
                    hoverBorderColor: '#98FFC5FF',
                    backgroundColor: "#98FFC588",
                    borderColor: "#98FFC5FF",
                    borderWidth: 3,
                    data: [0, 0, 0, 0, mayo, junio]
                }
                ]
            }

            var ctx = document.getElementById("graficoBarra").getContext("2d");
            var BarChart = new Chart(ctx, {
                type: 'bar',
                data: dataBar,
                options: optionsBar          
            });
    });
    
}
    
</script>

@endsection

@section('charts')
{!! $chart->script() !!}
@endsection