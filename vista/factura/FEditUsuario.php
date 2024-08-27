<?php
    require_once "../../controlador/usuarioControlador.php";
    require_once "../../modelo/usuarioModelo.php";

    $id = $_GET["id"];
    $usuario = ControladorUsuario::ctrInfoUsuario($id);
?>

<form action="" id="FEditUsuario">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Edición de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="login">Login Usuario</label>
            <input type="text" class="form-control" name="login" id="login" value="<?php echo $usuario['login_usuario']; ?>" readonly>
            <input type="hidden" name="idUsuario" value="<?php echo $usuario['id_usuario']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?php echo $usuario['password']; ?>">
        </div>
        <div class="form-group">
            <label for="vrPassword">Repetir Password</label>
            <input type="password" class="form-control" name="vrPassword" id="vrPassword" value="<?php echo $usuario['password']; ?>">
            <input type="hidden" value="<?php echo $usuario['password']; ?>" name="passActual">
        </div>
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select name="perfil" id="perfil" class="form-control">
                <option value="Administrador" <?php if($usuario['perfil'] == "Administrador") echo "selected"; ?>>Administrador</option>
                <option value="Moderador" <?php if($usuario['perfil'] == "Moderador") echo "selected"; ?>>Moderador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="estadoActivo" name="estado" <?php if($usuario['estado_usuario'] == "1") echo "checked"; ?> value="1">
                        <label for="estadoActivo" class="custom-control-label">Activo</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="estadoInactivo" name="estado" <?php if($usuario['estado_usuario'] == "0") echo "checked"; ?> value="0">
                        <label for="estadoInactivo" class="custom-control-label">Inactivo</label>
                    </div>
                </div>
            </div>
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
      editUsuario(); // Función que procesa la edición del usuario
    }
  });

  $.validator.addMethod("matchPassword", function(value, element) {
    return value === $('#password').val(); // Verifica si las contraseñas coinciden
  }, "Las contraseñas no coinciden");

  $('#FEditUsuario').validate({
    rules: {
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
        required: true,
        minlength: 3,
        matchPassword: true // Aplica la validación personalizada
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
