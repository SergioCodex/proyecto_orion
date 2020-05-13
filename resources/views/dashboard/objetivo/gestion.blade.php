@extends('dashboard.master')

@section('title')
Dashboard [Gestionar Objetivo {{ $objetivo->id }}]
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
                    <p><span class="font-weight-bold">Sector:</span> <br>
                        <span class="font-weight-bold">Objetivo:</span>
                        <br><span class="font-weight-bold">Descripción:</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4 class="lead">Requisitos:</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="tarjeta p-4 shadow-sm">
                    <div class="col-12">
                        <div class="nota-info p-3 mb-3">
                            <b>Nota:</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="tarjeta p-4 shadow-sm">
            <div class="row p-1 justify-content-start">
                <div class="col-auto mt-2">
                    <span class="text-muted">Status Ticket:</span>
                </div>
                <div class="col-auto">
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Prioridad:</span> <span class="ml-2"></span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Agente:</span> <span class="ml-2"></span>
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
                    <span class="text-muted">ID Ticket:</span> <span class="ml-2"></span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Creado en:</span> <span class="ml-2"></span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Actualizado en:</span> <span class="ml-2"></span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Respuestas:</span> <span class="ml-2"></span>
                </div>
            </div>
        </div>
        <div class="tarjeta p-4 shadow-sm mt-3">
            <h4 class="lead">Respuestas:</h4>
            <hr>
        </div>
    </div>
</div>
@endsection