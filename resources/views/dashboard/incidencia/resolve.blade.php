@extends('dashboard.master')

@section('title')
Incidencia Nº {{ $incidencia->id }}
@endsection

@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-10 ">
        @if (session('status'))
        <div class="nota-info p-3">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-3 justify-content-center">
    <div class="col-6">
        <div class="tarjeta p-4 shadow-sm">
            <h4 class="lead">Información</h4>
            <div class="row">
                <div class="col-4 ml-3">
                    <p><span class="font-weight-bold">Sector:</span> {{ $incidencia->sector->nombre}}<br>
                        <span class="font-weight-bold">Comunicador:</span> <a
                            href="{{ route('tripulante.show', $incidencia->tripulante->id)}}">
                            {{ $incidencia->tripulante->name}}</a>
                        <br><span class="font-weight-bold">Email:</span> {{ $incidencia->tripulante->email}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4 class="lead">Notas:</h4>
                        </div>
                    </div>
                    @foreach ($incidencia->notas as $nota)
                    <div class="tarjeta-amarilla mt-1">
                        <div class="row justify-content-between">
                            <div class="col-9 ml-2">
                                <small> Nota escrita por: <b>{{ $nota->tripulante->name }}</b></small>
                            </div>
                            <div class="col-1 mr-3">
                                <form style="display: inline;" action="{{ route('nota.destroy', $nota->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-secondary"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ml-2 mt-1">
                                <p class="text-monospace">{{ $nota->contenido }}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <button data-nota="" data-toggle="modal" data-target="#crearNota"
                        class="btn btn-outline-primary mt-3"><i class="fa fa-sticky-note mr-1"></i> Añadir
                        nota</button>
                    @include('dashboard.partials.create-nota')
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="tarjeta p-4 shadow-sm">
                    <div class="col-12">
                        <div class="nota-info p-3 mb-3">
                            <b>Nota:</b> este ticket está gestionado por {{ $incidencia->agente->name }}
                        </div>
                    </div>
                    <form action="{{ route('mensajeincidencia.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id_incidencia" value="{{ $incidencia->id }}">
                            <label class="lead" for="mensaje">Mensaje</label>
                            @error('contenido')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <textarea id="descripcion" class="form-control" name="contenido" id="" rows="2"
                                placeholder="Escribe tu respuesta..."></textarea>
                        </div>
                        <button class="btn btn-outline-success mt-1"><i class="fa fa-comment mr-1"></i> Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="tarjeta p-4 shadow-sm">
            <div class="row p-1 justify-content-start">
                <div class="col-auto mt-2">

                    @if ($incidencia->status == 'Resuelto')
                    @php
                    $resuelto = 'selected';
                    $progreso = '';
                    $abierto = '';
                    @endphp
                    @elseif($incidencia->status == 'En progreso')
                    @php
                    $resuelto = '';
                    $progreso = 'selected';
                    $abierto = '';
                    @endphp
                    @elseif($incidencia->status == 'Abierto')
                    @php
                    $resuelto = '';
                    $progreso = '';
                    $abierto = 'selected';
                    @endphp
                    @endif

                    <span class="text-muted">Status Ticket:</span>

                </div>
                <div class="col-auto">
                    <form action="{{ route('incidencia.update-status', $incidencia->id)}}" style="display: flex"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <select class="form-control" name="status" class="mr-5">
                                <option value="Resuelto" {{$resuelto}}>Resuelto</option>
                                <option value="En progreso" {{$progreso}}>En progreso</option>
                                <option value="Abierto" {{$abierto}}>Abierto</option>
                            </select>
                        </div>
                        <div class="col-auto"><button type="submit"
                                class="btn btn-block btn-outline-primary">Cambiar</button></div>
                    </form>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Agente:</span> <span class="ml-2">{{ $incidencia->agente->name }}</span>
                </div>
            </div>
        </div>
        <div class="tarjeta p-4 shadow-sm mt-3">
            <div class="row mb-3">
                <div class="col-auto lead">
                    Detalles
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">ID Ticket:</span> <span class="ml-2">{{ $incidencia->id }}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Creado en:</span> <span
                        class="ml-2">{{ $incidencia->created_at->format('d-m-Y') }}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Actualizado en:</span> <span
                        class="ml-2">{{ $incidencia->updated_at->format('d-m-Y') }}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Respuestas:</span> <span
                        class="ml-2">{{ $incidencia->mensajes_incidencias->count() }}</span>
                </div>
            </div>
        </div>
        <div class="tarjeta p-4 shadow-sm mt-3">
            <h4 class="lead">Respuestas:</h4>
            <hr>
            @if ($incidencia->mensajes_incidencias->count() == 0)
            <div class="row">
                <div class="col-auto text-justify ml-3">
                    No hay respuestas
                </div>
            </div>
            @endif
            @foreach ($incidencia->mensajes_incidencias as $mensaje)
            <div class="row p-1">
                <div class="col-auto">
                    <div class="mb-2"><small>Respuesta por <b>{{$mensaje->tripulante->name}}</b> a las
                            {{ $mensaje->created_at->format('H:i:s')}} del
                            {{$mensaje->created_at->format('d-m-Y')}}</small></div>
                </div>
            </div>
            <div class="row">
                <div class="col-auto text-justify ml-3">
                    {!! $mensaje->contenido !!}
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection