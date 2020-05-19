@extends('dashboard.master')

@section('title')
Dashboard [Objetivos]
@endsection

@section('content')
<div class="row mt-5">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success text-center ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-2 mb-3">
    <div class="col-12">
        <a href="{{ route('objetivo.create')}}" class="btn btn-success btn-lg btn-block shadow-sm text-light"> <i
                class="fa fa-plus mr-1"></i>Registrar objetivo</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <table id="tabla_datatable" class="table table-hover table-bordered shadow"
            style="font-family: 'Fira Sans Condensed', sans-serif; font-size: 17px;">
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

                @if (in_array($objetivo->id, $array_alertas))
                <tr class="table-danger" style="background-color: rgb(243, 248, 255)">
                    @else
                <tr style="background-color: rgb(243, 248, 255)">
                    @endif

                    <td class="font-italic">{{ $objetivo->id }}</td>
                    <td class="">{{ $objetivo->titulo }}</td>
                    <td>{{ $objetivo->descripcion }}</td>
                    <td>{{ $objetivo->sector->nombre }}</td>
                    <td>{{ $objetivo->created_at->format('d-m-Y') }}</td>
                    <td style="width: 62px;">
                        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $objetivo->id }}"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        <a href="{{ route('objetivo.gestion', $objetivo->id) }}" class="btn btn-success btn-sm"><i
                                class="fa fa-hammer"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $objetivos->links() }} --}}
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

    $('#tabla_datatable').DataTable({
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    });
}
</script>
@endsection