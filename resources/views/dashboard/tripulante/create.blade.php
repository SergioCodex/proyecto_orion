{{-- @extends('dashboard.master')

@section('title')
Registrar Tripulante
@endsection

@section('content')

@include('dashboard.partials.validation-error')

<div class="row  mt-5">
    <div class="col-6">
        <form action="{{ route("tripulante.store") }}" method="POST">
@include('dashboard.tripulante._form')
</form>
</div>
</div>
@endsection --}}

<form v-on:submit.prevent="createTripulante" method="post">
    <div class="modal fade" id="creacion">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Creación</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="validationDefault01"
                                placeholder="Nombre..." v-model="name"
                                value="{{ old('name', $tripulante->nombre  ?? '') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="validationDefault02"
                                placeholder="Apellidos..." v-model="apellidos"
                                value="{{ old('apellidos', $tripulante->apellidos  ?? '') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Email..." v-model="email" aria-describedby="inputGroupPrepend2"
                                    value="{{ old('email', $tripulante->email  ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="rol">Rol</label>
                            <select name="id_rol" class="form-control" v-model="id_rol">
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="id_sector">Sector</label>
                            <select name="id_sector" class="form-control" v-model="id_sector">
                                @foreach ($sectores as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="validationDefault0100"
                                placeholder="Contraseña..." v-model="password">
                        </div>
                    </div>
                    <hr>
                    @include('dashboard.partials.validation-error')
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Crear">
                </div>
            </div>
        </div>

    </div>
</form>