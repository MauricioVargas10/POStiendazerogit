<form action="" id="FRegCliente">
  <div class="modal-header bg-primary">
    <h4 class="modal-title">Registro nuevo cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Login cliente</label>
      <input type="text" class="form-control" name="login" id="login">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="">Repetir password</label>
      <input type="password" class="form-control" name="vrPassword" id="vrPassword">
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
      regCliente();
    }
  });

  $('#FRegCliente').validate({
    rules: {
      login: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
        required: true,
        minlength: 3,
        equalTo: "#password" // Asegúrate de que la confirmación de contraseña coincida
      }
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

function regCliente() {
  $.ajax({
    url: "controlador/clienteControlador.php?ctrRegCliente", // Cambia esto por la URL correcta
    type: 'POST',
    data: $('#FRegCliente').serialize(),
    success: function (response) {
      if (response === "ok") {
        alert("Cliente registrado exitosamente");
        $('#FRegCliente')[0].reset();
        $("#modal-default").modal("show"); // Cambia '#modalID' por el ID de tu modal
        // location.reload(); // Opcional: Recarga la página
      } else {
        alert("Error al registrar el cliente: " + response);
      }
    },
    error: function () {
      alert("Hubo un error al procesar la solicitud");
    }
  });
}
</script>
