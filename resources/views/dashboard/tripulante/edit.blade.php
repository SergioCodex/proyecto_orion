@extends('dashboard.master')

@section('content')
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
@endforeach
@endif
@endsection