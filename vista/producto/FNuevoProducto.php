<form action="" id="FRegProducto">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Ingreso de Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Codigo del Producto</label>
            <input type="text" class="form-control form-control-border" name="codigo" id="codigo">
        </div>
        <div class="form-group">
            <label for="">Codigo del Producto SIN</label>
            <input type="text" class="form-control form-control-border" name="codigoSIN" id="codigoSIN">
        </div>
        <div class="form-group">
            <label for="">Nombre del Producto</label>
            <input type="text" class="form-control form-control-border" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="">Precio del Producto</label>
            <input type="number" step="any" class="form-control form-control-border" name="precio" id="precio">
        </div>
        <div class="form-group">
            <label for="">Unidad de Medida</label>
            <input type="text" class="form-control form-control-border" name="Umedida" id="Umedida">
        </div>
        <div class="form-group">
            <label for="">Unidad de Medida SIN</label>
            <input type="text" class="form-control form-control-border" name="UmedidaSIN" id="UmedidaSIN">
        </div>
        <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen" onchange="previewImage(event)">      
            <center><img id="preview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 150px; margin-top: 20px ;"></center>
       </div>
       </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
  
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      regProducto(); // Función para manejar el registro del producto
    }
  });
  

  $('#FRegProducto').validate({
    rules: {
      codigo: {
        required: true,
        minlength: 3,
      },
      nombre: {
        required: true,
        minlength: 3,
      },
      precio: {
        required: true,
        minlength: 1,
        //matchPassword: true // Aplica la regla personalizada
      },
      Umedida: {
        required: true,
        minlength: 3,
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
  $('#imagen').change(function () {
    const [file] = this.files;
    if (file) {
      $('#preview').attr('src', URL.createObjectURL(file)).show();
    }
  });
});
</script>
