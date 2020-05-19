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
                <div class="col-10 ml-3">
                    <p><span class="font-weight-bold">Sector:</span> {{ $objetivo->sector->nombre}} <br>
                        <span class="font-weight-bold">Objetivo: </span>{{ $objetivo->titulo}}
                        <br><span class="font-weight-bold">Descripción:</span> </p>
                    <div class="tarjeta shadow-sm p-3 mb-3">{!! $objetivo->descripcion !!}</div>
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
            <div class="row">
                <div class="col-3 ml-3">
                    <p><span class="font-weight-bold">Oxígeno:</span> <br>
                        <span class="font-weight-bold">Energía:</span> <br>
                        <span class="font-weight-bold">Combustible:</span> <br>
                        <span class="font-weight-bold">Agua:</span> <br>
                        <span class="font-weight-bold">Alimento:</span>
                </div>
                <div class="col-5">
                    {{ $requisitos->oxigeno}} ud. <br>
                    {{ $requisitos->energia}} ud.<br>
                    {{ $requisitos->combustible}} ud.<br>
                    {{ $requisitos->agua}} ud.<br>
                    {{ $requisitos->alimento}} ud.</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="tarjeta p-4 shadow-sm">
                    <div class="col-12">
                        <div class="nota-info p-3 mb-3">
                            <b>Nota:</b> Tenga en cuenta los recursos requeridos para el cumplimiento de la misión.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="tarjeta p-4 shadow-sm">
            <div class="row mb-3">
                <div class="col-auto lead">
                    Detalles
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">ID Objetivo:</span> <span class="ml-2">{{ $objetivo->id }}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Creado en:</span> <span class="ml-2">
                        {{ $objetivo->created_at->format('d-m-Y')}}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-auto">
                    <span class="text-muted">Actualizado en:</span> <span
                        class="ml-2">{{ $objetivo->updated_at->format('d-m-Y')}}</span>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-12">
                    <span class="text-muted">Alertas:</span>
                    @if ($alertas->count() > 0)
                    @foreach ($alertas as $alerta)
                    <div class="row">
                        <div class="col-12 mt-4 mb-2">
                            <span class="ml-2 alert alert-danger"><small>{{ $alerta->mensaje }}</small></span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <span class="ml-2">No hay alertas <i class="text-success fa fa-smile-beam ml-2"></i>
                    </span>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
<div class="row justify-content-center">
    <div class="col-10">
        <div class="tarjeta p-4 shadow-sm mt-3">
            <h4 class="lead">Recursos:</h4>
            <hr>
            <form name="recursosForm" action="{{ route('objetivo.update-consumo', $objetivo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="oxigenoRange">Oxígeno <i class="fa fa-lungs ml-1"></i></label>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <input type="range" name="oxigeno" class="custom-range" min="0" max="{{ $recursos->oxigeno }}"
                            value="{{ $objetivo->consumos_objetivo->oxigeno }}"
                            data-requisito="{{ $requisitos->oxigeno }}" step="1000" id="oxigenoRange"
                            oninput="oxigenoOutputId.value = oxigenoRange.value">
                    </div>
                    <div class="col-2">
                        <div class="tarjeta-recursos text-center shadow-sm">
                            <output class="text-success" name="oxigenoOutputName"
                                id="oxigenoOutputId">{{ $objetivo->consumos_objetivo->oxigeno }}</output> /
                            {{ $requisitos->oxigeno }}
                        </div>
                    </div>
                    <div id="alarma-oxigeno"></div>
                </div>
                <hr>

                <label for="energiaRange">Energía <i class="fa fa-power-off ml-1"></i></label>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <input type="range" name="energia" class="custom-range" min="0" max="{{ $recursos->energia }}"
                            value="{{ $objetivo->consumos_objetivo->energia }}"
                            data-requisito="{{ $requisitos->energia }}" step="1000" id="energiaRange"
                            oninput="energiaOutputId.value = energiaRange.value">
                    </div>
                    <div class="col-2">
                        <div class="tarjeta-recursos text-center shadow-sm">
                            <output class="text-success" name="energiaOutputName"
                                id="energiaOutputId">{{$objetivo->consumos_objetivo->energia }}</output> /
                            {{ $requisitos->energia }}
                        </div>
                    </div>
                    <div id="alarma-energia"></div>
                </div>
                <hr>

                <label for="combustibleRange">Combustible <i class="fa fa-gas-pump ml-1"></i></label>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <input type="range" name="combustible" class="custom-range" min="0"
                            max="{{ $recursos->combustible }}" value="{{ $objetivo->consumos_objetivo->combustible }}"
                            data-requisito="{{ $requisitos->combustible }}" step="1000" id="combustibleRange"
                            oninput="combustibleOutputId.value = combustibleRange.value">
                    </div>
                    <div class="col-2">
                        <div class="tarjeta-recursos text-center shadow-sm">
                            <output class="text-success" name="combustibleOutputName"
                                id="combustibleOutputId">{{ $objetivo->consumos_objetivo->combustible }}</output>
                            /
                            {{ $requisitos->combustible }}
                        </div>
                    </div>
                    <div id="alarma-combustible"></div>
                </div>
                <hr>

                <label for="aguaRange">Agua <i class="fa fa-tint ml-1"></i></label>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <input type="range" name="agua" class="custom-range" min="0" max="{{ $recursos->agua }}"
                            value="{{ $objetivo->consumos_objetivo->agua }}" data-requisito="{{ $requisitos->agua }}"
                            step="1000" id="aguaRange" oninput="aguaOutputId.value = aguaRange.value">
                    </div>
                    <div class="col-2">
                        <div class="tarjeta-recursos text-center shadow-sm">
                            <output class="text-success" name="aguaOutputName"
                                id="aguaOutputId">{{$objetivo->consumos_objetivo->agua}}</output>
                            /
                            {{ $requisitos->agua }}
                        </div>
                    </div>
                    <div id="alarma-agua"></div>
                </div>
                <hr>

                <label for="alimentoRange">Alimento <i class="fa fa-utensils ml-1"></i></label>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <input name="alimento" type="range" class="custom-range" min="0" max="{{ $recursos->alimento }}"
                            value="{{ $objetivo->consumos_objetivo->alimento }}"
                            data-requisito="{{ $requisitos->alimento }}" step="1000" id="alimentoRange"
                            oninput="alimentoOutputId.value = alimentoRange.value">
                    </div>
                    <div class="col-2">
                        <div class="tarjeta-recursos text-center shadow-sm">
                            <output class="text-success" name="alimentoOutputName"
                                id="alimentoOutputId">{{$objetivo->consumos_objetivo->alimento }}</output> /
                            {{ $requisitos->agua }}
                        </div>
                    </div>
                    <div id="alarma-alimento"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" name="" id="enviar_recursos"
                            class="btn btn-warning btn-block shadow mt-2">Administrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    // document.recursosForm.oxigenoRange.oninput = function(){
    // document.recursosForm.oxigenoOutputId.value = document.recursosForm.oxigenoRange.value;
    // }
    // document.recursosForm.energiaRange.oninput = function(){
    // document.recursosForm.energiaOutputId.value = document.recursosForm.energiaRange.value;
    // }
    // document.recursosForm.combustibleRange.oninput = function(){
    // document.recursosForm.combustibleOutputId.value = document.recursosForm.combustibleRange.value;
    // }
    // document.recursosForm.aguaRange.oninput = function(){
    // document.recursosForm.aguaOutputId.value = document.recursosForm.aguaRange.value;
    // }
    // document.recursosForm.alimentoRange.oninput = function(){
    // document.recursosForm.alimentoOutputId.value = document.recursosForm.alimentoRange.value;
    // }

    window.onload = function(){
        var alarma = [];

        function alarma_recurso(requisito, recurso) {

            rango = $("#" + recurso + "Range").val();

            if(rango < requisito){
                $("#" + recurso + "OutputId").removeClass('text-success');
                $("#" + recurso + "OutputId").addClass('text-danger');
                if(!alarma.includes(recurso)){
                    alarma.push(recurso);
                    $("#alarma-" + recurso).html("<small class='text-danger'>Los recursos asignados no cumplen los requisitos.</small>");
                }
            } else if (rango >= requisito) {
                if(alarma.includes(recurso)){
                    $("#" + recurso + "OutputId").removeClass('text-danger');
                    $("#" + recurso + "OutputId").addClass('text-success');
                    for(var key in alarma) {
                        if (alarma[key] == recurso){
                            alarma.splice(key, 1);
                            $("#alarma-" + recurso).html("");
                        }
                    }
                }
            }

            console.log(alarma);
            if(alarma.length == 0){
                $("#enviar_recursos").prop('disabled', false);
            } else {
                $("#enviar_recursos").prop('disabled', true);
            }

        }

        var recursos = ['oxigeno', 'energia', 'combustible', 'agua', 'alimento'];

        recursos.forEach(element => {
            rango = $("#" + element + "Range").val();
            requisito = $("#" + element + "Range").data('requisito');

            if(rango < requisito){
                $("#" + element + "OutputId").removeClass('text-success');
                $("#" + element + "OutputId").addClass('text-danger');
                alarma.push(element);
                $("#alarma-" + element).html("<small class='text-danger'>Los recursos asignados no cumplen los requisitos.</small>");
            }
            
        });

        if(alarma.length == 0){
                $("#enviar_recursos").prop('disabled', false);
            } else {
                $("#enviar_recursos").prop('disabled', true);
            }

        $("#oxigenoRange").change(function(){
            requisito_oxigeno = $("#oxigenoRange").data('requisito');
            alarma_recurso(requisito_oxigeno, 'oxigeno');
        });

        $("#energiaRange").change(function(){
            requisito_energia = $("#energiaRange").data('requisito');
            alarma_recurso(requisito_energia, 'energia');
        });

        $("#combustibleRange").change(function(){
            requisito_combustible = $("#combustibleRange").data('requisito');
            alarma_recurso(requisito_combustible, 'combustible');
        });
        
        $("#aguaRange").change(function(){
            requisito_agua = $("#aguaRange").data('requisito');
            alarma_recurso(requisito_agua, 'agua');
            
        });

        $("#alimentoRange").change(function(){
            requisito_alimento = $("#alimentoRange").data('requisito');
            alarma_recurso(requisito_alimento, 'alimento');
        });

        

    }
</script>
@endsection