@extends('dashboard.master')

@section('title')
    Editando incidencia Nº {{ $incidencia->id }}
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col">
            <form action="{{ route("incidencia.update", $incidencia->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('dashboard.incidencia._form_update')
                
            </form>
        </div>
    </div>
@endsection