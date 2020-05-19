@extends('dashboard.master')

@section('title')
Dashboard [Alertas]
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
<div class="row mt-5">
    <div class="col-12">
        <table id="tabla_datatable" class="table table-hover table-bordered shadow"
            style="font-family: 'Fira Sans Condensed', sans-serif; font-size: 17px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Recurso</th>
                    <th>Sector</th>
                    <th>Objetivo</th>
                    <th>Mensaje</th>
                    <th>Generado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alertas as $alerta)
                    <tr class="table-warning" style="background-color: rgb(243, 248, 255)">
                    <td class="font-italic">{{ $alerta->id }}</td>
                    <td class="">{{ $alerta->recurso }}</td>
                    <td>{{ $alerta->sector->nombre }}</td>
                    <td>{{ $alerta->objetivo->titulo }}</td>
                    <td>{{ $alerta->mensaje }}</td>
                    <td>{{ $alerta->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('objetivo.gestion', $alerta->id_objetivo)}}"
                            class="btn btn-success btn-block btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $alertas->links() }} --}}
        {{-- @include('dashboard.alerta.destroy') --}}
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
        modal.find('.modal-title').text('Eliminar alerta: ' + id)
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