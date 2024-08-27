<form action="" id="FRegUsuario">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Ingreso de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Login Usuario</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="login" id="login">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control form-control-border" placeholder="" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="">Repetir Password</label>
            <input type="password" class="form-control form-control-border" placeholder="" name="vrPassword" id="vrPassword">
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
      regUsuario(); // Función para manejar el registro del usuario
    }
  });
  
  $.validator.addMethod("matchPassword", function(value, element) {
    return value === $('#password').val(); // Compara el valor con el campo de contraseña
  }, "Las contraseñas no coinciden");

  $('#FRegUsuario').validate({
    rules: {
      login: {
        required: true,
        minlength: 3,
      },
      password: {
        required: true,
        minlength: 3,
      },
      vrPassword: {
        required: true,
        minlength: 3,
        matchPassword: true // Aplica la regla personalizada
      },
    },
    messages: {
      vrPassword: {
        required: "Por favor, repita su contraseña",
        minlength: "La contraseña debe tener al menos 3 caracteres",
        matchPassword: "Las contraseñas no coinciden"
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
</script>
