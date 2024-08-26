<form action="" id="FRegCliente">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Ingreso de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label for="">Razon Social</label>
            <input type="text" class="form-control form-control-border"  name="rsocial" id="rsocial">
        </div>
        <div class="form-group">
            <label for="">Nit</label>
            <input type="text" class="form-control form-control-border"  name="nit" id="nit">
        </div>
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control form-control-border"  name="direccion" id="direccion">
        </div>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control form-control-border"  name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control form-control-border"  name="telefono" id="telefono">
        </div>
        <div class="form-group">
            <label for="">Gmail</label>
            <input type="text" class="form-control form-control-border"  name="gmail" id="gmail">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      regCliente(); // Función para manejar el registro del Cliente
    }
  });
  

  $('#FRegCliente').validate({
    rules: {
      rsocial: {
        required: true,
        minlength: 3,
      },
      nit: {
        required: true,
        minlength: 3,
      },
      direccion: {
        required: true,
        minlength: 8,
      },
      nombre: {
        required: true,
        minlength: 3,
      },
      telefono: {
        required: true,
        minlength: 8,
      },
      gmail: {
        required: true,
        minlength: 8,
      },
    },

    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
