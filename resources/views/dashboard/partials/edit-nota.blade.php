<form action="{{ route('nota.update', 0) }}" data-action="{{ route('tripulante.destroy', 0) }}" method="post" id="formUpdate">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editarNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="contenido" id="contenidoNota" cols="64" rows="2"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_incidencia" value="{{ $incidencia->id }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Nota</button>
                </div>
            </div>
        </div>
    </div>
</form>