@extends('dashboard.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <form action="{{ route("tripulante.update", $tripulante->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('dashboard.tripulante._form')
        </form>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">

            {{ $error }}

        </div>
    </div>
</div>
@endforeach
@endif
@endsection