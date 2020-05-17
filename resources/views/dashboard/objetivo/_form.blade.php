<div class="form-group">
    <div class="col-auto">
        <h5><label for="titulo">Título</label></h5>
        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
            placeholder="Título..." value="{{ old('titulo', $incidencia->titulo  ?? '') }}">
        @error('titulo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 mb-12">
        <h5><label for="id_sector">Sector</label></h5>
        <select name="id_sector" class="form-control" v-model="id_sector">
            @foreach ($sectores as $sector)
            <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-auto">
        <h5><label for="descripcion">Descripción</label></h5>
        <textarea id="descripcion" class="form-control" name="descripcion" rows="10"
            placeholder="Describa el propósito de su objetivo...">{{ old('descripcion', $incidencia->descripcion  ?? '') }}</textarea>
    </div>
    @error('descripcion')
        <small class="text-danger ml-3">{{$message}}</small>
    @enderror
</div>

<div class="tarjeta p-4 shadow-sm mt-3">
    <h4 class="lead">Recursos:</h4>
    <hr>
    <label for="oxigenoRange">Oxígeno <i class="fa fa-lungs ml-1"></i></label>
    <div class="row justify-content-center">
        <div class="col-9 mt-2">
            <input type="range" name="oxigeno" class="custom-range" min="0" max="{{ $recursos->oxigeno }}" value="0"
                step="1000" id="oxigenoRange" oninput="oxigenoOutputId.value = oxigenoRange.value">
        </div>
        <div class="col-3">
            <div class="tarjeta-recursos text-center shadow-sm">
                <output class="text-success" name="oxigenoOutputName" id="oxigenoOutputId">0</output> /
                {{ $recursos->oxigeno }}
            </div>
        </div>
    </div>
    <hr>

    <label for="energiaRange">Energía <i class="fa fa-power-off ml-1"></i></label>
    <div class="row justify-content-center">
        <div class="col-9 mt-2">
            <input type="range" name="energia" class="custom-range" min="0" max="{{ $recursos->energia }}" value="0"
                step="1000" id="energiaRange" oninput="energiaOutputId.value = energiaRange.value">
        </div>
        <div class="col-3">
            <div class="tarjeta-recursos text-center shadow-sm">
                <output class="text-success" name="energiaOutputName" id="energiaOutputId">0</output> /
                {{ $recursos->energia }}
            </div>
        </div>
    </div>
    <hr>

    <label for="combustibleRange">Combustible <i class="fa fa-gas-pump ml-1"></i></label>
    <div class="row justify-content-center">
        <div class="col-9 mt-2">
            <input type="range" name="combustible" class="custom-range" min="0" max="{{ $recursos->combustible }}"
                value="0" step="1000" id="combustibleRange"
                oninput="combustibleOutputId.value = combustibleRange.value">
        </div>
        <div class="col-3">
            <div class="tarjeta-recursos text-center shadow-sm">
                <output class="text-success" name="combustibleOutputName" id="combustibleOutputId">0</output>
                /
                {{ $recursos->combustible }}
            </div>
        </div>
    </div>
    <hr>

    <label for="aguaRange">Agua <i class="fa fa-tint ml-1"></i></label>
    <div class="row justify-content-center">
        <div class="col-9 mt-2">
            <input type="range" name="agua" class="custom-range" min="0" max="{{ $recursos->agua }}" value="0"
                step="1000" id="aguaRange" oninput="aguaOutputId.value = aguaRange.value">
        </div>
        <div class="col-3">
            <div class="tarjeta-recursos text-center shadow-sm">
                <output class="text-success" name="aguaOutputName" id="aguaOutputId">0</output>
                /
                {{ $recursos->agua }}
            </div>
        </div>
    </div>
    <hr>

    <label for="alimentoRange">Alimento <i class="fa fa-utensils ml-1"></i></label>
    <div class="row justify-content-center">
        <div class="col-9 mt-2">
            <input name="alimento" type="range" class="custom-range" min="0" max="{{ $recursos->alimento }}" value="0"
                step="1000" id="alimentoRange" oninput="alimentoOutputId.value = alimentoRange.value">
        </div>
        <div class="col-3">
            <div class="tarjeta-recursos text-center shadow-sm">
                <output class="text-success" name="alimentoOutputName" id="alimentoOutputId">0</output> /
                {{ $recursos->agua }}
            </div>
        </div>
    </div>

</div>

<input type="submit" class="btn btn-lg btn-primary float-right mr-3 mt-4" value="Enviar">