@extends('dashboard.master')

@section('title')
Índice dashboard-tripulante
@endsection

@section('content')

<div class="row justify-content-end mt-5">
    <div class="col-3">
        <h2 class="mb-4">Datos Tripulantes</h2>
    </div>
    <div class="col-3">
        @include('dashboard.partials.success-action')
        @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-lg btn-block shadow text-light" style="margin-top: " data-toggle="modal"
            data-target="#creacion"> <i class="fa fa-plus mr-1"></i> Registrar
            Tripulante</button>
    </div>

</div>
<div class="row justify-content-between">
    <div class="col-6">
        <table class="table table-responsive table-hover shadow" style="padding: 20px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Sector</th>
                    <th>Email</th>
                    <th>Creado el</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tripulantes as $tripulante)
                <tr>
                    <td>{{ $tripulante->id }}</td>
                    <td>{{ $tripulante->name }}</td>
                    <td>{{ $tripulante->rol->nombre }}</td>
                    <td>{{ $tripulante->sector->nombre }}</td>
                    <td>{{ $tripulante->email }}</td>
                    <td>{{ $tripulante->created_at->format('d-m-Y') }}</td>
                    <td><button class="btn btn-primary btn-sm showTrip" data-name="{{ $tripulante->name }}"
                            data-apellido="{{ $tripulante->apellidos }}" data-email="{{ $tripulante->email }}"
                            data-rol="{{ $tripulante->rol->nombre }}" data-sector="{{ $tripulante->sector->nombre }}"><i
                                class="fa fa-eye"></i></button>
                        <a href="{{ route('tripulante.edit', $tripulante->id)}}" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></a>
                        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $tripulante->id }}"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $tripulantes->links() }}
        @include('dashboard.tripulante.create') {{-- No muestra el error de email duplicado --}}
        @include('dashboard.tripulante.show')
        @include('dashboard.tripulante.destroy')
    </div>
    <div class="col-3" style="margin-top: 50px">
        <div class="card shadow" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_tripulantes }}
                            </h2>
                            <small>Número de tripulantes</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-user-astronaut float-right"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mt-3" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_operarios }}
                            </h2>
                            <small>Número de operarios</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-briefcase float-right"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-warning btn-lg btn-block mt-3 shadow">Botón</button>
    </div>
    <div class="col-3" style="margin-top: 50px">
        <div class="card shadow" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $n_superiores }}
                            </h2>
                            <small>Número de superiores</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-user-tie float-right"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mt-3" style="height: 100px">
            <div class="card-body mt-2">
                <div style="margin-left: 10px">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $capitan->name }}
                            </h2>
                            <small>Capitan</small>
                        </div>
                        <div class="col-3 mr-3 mt-2">
                            <h3><i class="fa fa-address-card float-right"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-warning btn-lg btn-block mt-3 shadow">Botón</button>
    </div>


</div>
<div class="row">

</div>

<script>
    window.onload = function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id') 

        action = $('#formDelete').attr('data-action').slice(0, -1);
        //console.log(action+id);

        $('#formDelete').attr('action', action + id)
        var modal = $(this)
        modal.find('.modal-title').text('Eliminar tripulante: ' + id)
})
    }
</script>

@endsection