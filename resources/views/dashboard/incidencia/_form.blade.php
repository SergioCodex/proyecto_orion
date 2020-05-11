<div class="form-group" >
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
            placeholder="Describa su pobrema...">{{ old('descripcion', $incidencia->descripcion  ?? '') }}</textarea>
    </div>
</div>
<input type="submit" class="btn btn-lg btn-primary float-right mr-3" value="Enviar">