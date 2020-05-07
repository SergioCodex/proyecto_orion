<template>
  <div>
    <div class="modal fade" id="show">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Detalles</h4>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="name">Nombre</label>
                <p>{{ tripulante.name }}</p>

              </div>
              <div class="col-md-4 mb-3">
                <label for="apellidos">Apellidos</label>
              </div>
              <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="rol">Rol</label>
              </div>
              <div class="col-md-6 mb-3">
                <label for="id_sector">Sector</label>
              </div>
            </div>
            <hr />
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created(){
    console.log('creado')
  },
  props: ['tripulante'],
  data() {
    return {
      tripulanteSelected: ""
    }
  },
  methods: {
    tripulanteClick: function(){
      console.log('click');
    }
  },
};
</script>