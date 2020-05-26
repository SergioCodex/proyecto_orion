@extends('dashboard.master')

@section('title')
    Editar perfil
@endsection

@section('content')
    <div class="row mt-5 justify-content-center">
            <div class="col-6 tarjeta shadow-sm p-5 mt-3">
                <form action="{{ route("user.update", $tripulante->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('dashboard.user._form')
                </form>
        
                
            </div>

    </div>
@endsection