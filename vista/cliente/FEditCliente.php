<?php
    require_once "../../controlador/clienteControlador.php";
    require_once "../../modelo/clienteModelo.php";

    $id = $_GET["id"];
    $cliente = ControladorCliente::ctrInfoCliente($id);
?>

<form action="" id="FEditCliente">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Edición de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
 
        <div class="form-group">
            <label for="">Razon Social</label>
            <input type="text" class="form-control" name="rsocial" id="rsocial" value="<?php echo $cliente['razon_social_cliente']; ?>">
            <input type="hidden" name="idCliente" value="<?php echo $cliente['id_cliente']; ?>">
        </div>

        <div class="form-group">
            <label for="">Nit</label>
            <input type="text" class="form-control" name="nit" id="nit" value="<?php echo $cliente['nit_ci_cliente']; ?>">
        </div>

        <div class="form-group">
            <label for="">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $cliente['direccion_cliente']; ?>">
        </div>

        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $cliente['nombre_cliente']; ?>">
        </div>

        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $cliente['telefono_cliente']; ?>">
        </div>

        <div class="form-group">
            <label for="">Gmail</label>
            <input type="text" class="form-control" name="gmail" id="gmail" value="<?php echo $cliente['email_cliente']; ?>">
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
      editCliente(); // Función que procesa la edición del Cliente
    }
  });



  $('#FEditCliente').validate({
    rules: {
      razonSocial: {
        required: true,
        minlength: 5
      },
      nit: {
        required: true,
        minlength: 7,
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
