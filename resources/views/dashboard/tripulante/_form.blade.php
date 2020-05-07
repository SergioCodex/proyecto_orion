<div class="form-row mt-5">
    <div class="col-md-4 mb-3">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="name" id="validationDefault01" placeholder="Nombre..."
            value="{{ old('name', $tripulante->name  ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationDefault02">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="validationDefault02" placeholder="Apellidos..."
            value="{{ old('apellidos', $tripulante->apellidos  ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationDefaultUsername">Email</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
            </div>
            <input type="text" class="form-control" name="email" id="validationDefaultUsername" placeholder="Email..."
                aria-describedby="inputGroupPrepend2" value="{{ old('email', $tripulante->email  ?? '') }}">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="validationDefault03">Rol</label>
        <select name="id_rol" class="form-control">
            @foreach ($roles as $nombre => $id)
            <option {{ $tripulante->id_rol == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $nombre }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationDefault03">Sector</label>
        <select name="id_sector" class="form-control">
            @foreach ($sectores as $nombre => $id)
            <option {{ $tripulante->id_sector == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $nombre }}
            </option>
            @endforeach
        </select>
    </div>
</div>
<input type="submit" class="btn btn-primary" value="Enviar">

{{-- @error('title')
        <small class="text-danger">{{ $message}}</small>
        @enderror --}}