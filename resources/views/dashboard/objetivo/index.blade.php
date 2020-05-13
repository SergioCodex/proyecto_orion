@extends('dashboard.master')

@section('title')
    Dashboard [Objetivos]
@endsection

@section('content')
<div class="row mt-5 mb-3">
    <div class="col-12">
        <a href="" class="btn btn-success btn-lg btn-block shadow-sm text-light"> <i
                class="fa fa-plus mr-1"></i>Registrar objetivo</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <table class="table table-hover table-bordered shadow"
            style="padding: 20px; font-family: 'Fira Sans Condensed', sans-serif; font-size: 17px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Sector</th>
                    <th>Generado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($objetivos as $objetivo)

                @if ($objetivo->status == 'Resuelto')
                <tr class="table-success" style="background-color: rgb(243, 248, 255)">
                    @elseif($objetivo->status == "Abierto")
                <tr class="table-info" style="background-color: rgb(243, 248, 255)">
                    @else
                <tr style="background-color: rgb(243, 248, 255)">
                    @endif

                    <td class="font-italic">#{{ $objetivo->id }}</td>
                    <td class="">{{ $objetivo->titulo }}</td>
                    <td>{{ $objetivo->descripcion }}</td>
                    <td>{{ $objetivo->sector->nombre }}</td>
                    <td>{{ $objetivo->created_at->format('d-m-Y') }}</td>
                    <td style="width: 92px">
                        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $objetivo->id }}"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> 
                        <a href="{{ route('objetivo.gestion', $objetivo->id) }}" class="btn btn-success btn-sm"><i class="fa fa-hammer"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $objetivos->links() }}
        @include('dashboard.objetivo.destroy')
    </div>
</div>

<script type="application/javascript">
    window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        action = $('#formDelete').attr('data-action').slice(0, -1);
        //console.log(action+id);

        $('#formDelete').attr('action', action + id)
        var modal = $(this)
        modal.find('.modal-title').text('Eliminar objetivo: ' + id)
    });
}
</script>
@endsection