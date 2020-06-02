@extends('dashboard.master')

@section('title')
Dashboard [Incidencias]
@endsection

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success text-center ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-5 mb-3">
    <div class="col-12">
        <a href="{{ route('incidencia.create')}}" class="btn btn-success btn-lg btn-block shadow-sm text-light"> <i
                class="fa fa-plus mr-1"></i>Registrar incidencia</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <table id="tabla_datatable" class="table table-hover table-bordered shadow"
            style="font-family: 'Fira Sans Condensed', sans-serif; font-size: 17px;">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Título</th>
                    <th>ID</th>
                    <th>Creado por</th>
                    <th>Sector</th>
                    <th>Fecha</th>
                    <th>Agente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mis_incidencias as $incidencia)

                @if ($incidencia->status == 'Resuelto')
                <tr class="table-success" style="background-color: rgb(243, 248, 255)">
                    @elseif($incidencia->status == "Abierto")
                <tr class="table-info" style="background-color: rgb(243, 248, 255)">
                    @else
                <tr style="background-color: rgb(243, 248, 255)">
                    @endif

                    <td class="font-italic">{{ $incidencia->status }}</td>
                    <td class="">{{ $incidencia->titulo }}</td>
                    <td>{{ $incidencia->id }}</td>
                    <td>{{ $incidencia->tripulante->name }}</td>
                    <td>{{ $incidencia->sector->nombre }}</td>
                    <td>{{ $incidencia->created_at->format('d-m-Y') }}</td>
                    <td>{{ $incidencia->agente->name }}</td>
                    <td style="width: 30px">
                        <a href="{{route('user.resolve', [Auth::user()->id, $incidencia->id])}}" class="btn btn-success btn-block btn-sm"><i class="fa fa-comments"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $incidencias->links() }} --}}
    </div>
</div>

<script type="application/javascript">
    window.onload = function(){

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