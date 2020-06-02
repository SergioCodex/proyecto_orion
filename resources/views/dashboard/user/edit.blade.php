@extends('dashboard.master')

@section('title')
Editar perfil
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-6 tarjeta shadow-sm p-5">
        <h2 class="text-center" style="font-family: 'Baloo Chettan 2', cursive;">Editar perfil</h2>
        <div class="mt-5">
            <form action="{{ route("user.update", $tripulante->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('dashboard.user._form')
            </form>
        </div>


    </div>

</div>
@endsection