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
                    <span class="text-muted">Status Ticket:</span> <span class="ml-2">{{ $incidencia->status}}</span>
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