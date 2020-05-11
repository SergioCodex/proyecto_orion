@extends('dashboard.master')

@section('content')

<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <div class="card shadow">
            <div class="card-header p-3"><h4 class="ml-3 mt-1"> <i class="fa fa-exclamation-triangle text-danger mr-2"></i> Nueva incidencia</h4></div>
            <div class="card-body">

                <form action="{{ route("incidencia.store") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    @include('dashboard.incidencia._form')
                </form>

                {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">

            {{ $error }}

            </div>
            @endforeach
            @endif --}}
        </div>
    </div>
</div>
</div>

@endsection