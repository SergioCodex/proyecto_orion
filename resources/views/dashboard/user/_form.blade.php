<div class="form-row mt-2">
    <div class="col-md-6 mb-3">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="name" id="validationDefault01" placeholder="Nombre..."
            value="{{ old('name', $tripulante->name  ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationDefault02">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="validationDefault02" placeholder="Apellidos..."
            value="{{ old('apellidos', $tripulante->apellidos  ?? '') }}">
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="validationDefault03">Rol</label>
        <input class="form-control" type="text" value="{{ $tripulante->rol->nombre  }}" disabled>
        <input type="hidden" name="id_rol" value="{{ $tripulante->id_rol }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationDefault03">Sector</label>
        <input class="form-control" type="text" value="{{ $tripulante->sector->nombre  }}" disabled>
        <input type="hidden" name="id_sector" value="{{ $tripulante->id_sector }}">
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
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
    <label for="password">Contraseña actual</label>
    <div class="input-group">
        <input id="password" type="password" class="form-control  mb-3" name="current_password"
            autocomplete="current-password">
    </div>
    <label for="password">Nueva Contraseña</label>
    <div class="input-group">
        <input id="new_password" type="password" class="form-control  mb-3" name="new_password"
            autocomplete="current-password">
    </div>
    <label for="password">Confirmar Contraseña</label>
    <div class="input-group">
        <input id="new_confirm_password" type="password" class="form-control  mb-3" name="new_confirm_password"
            autocomplete="current-password">
    </div>
</div>
@if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
        
                    {{ $error }}
        
                </div>
                @endforeach
                @endif
<input type="submit" class="btn btn-primary float-right" value="Enviar">