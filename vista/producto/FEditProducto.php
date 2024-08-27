<?php
    require_once "../../controlador/productoControlador.php";
    require_once "../../modelo/productoModelo.php";

    $id = $_GET["id"];
    $producto = ControladorProducto::ctrInfoProducto($id);
?>

<form action="" id="FEditProducto">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Edición de Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="codigo">Codigo Producto</label>
            <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $producto['cod_producto']; ?>" readonly>
            <input type="hidden" name="idProducto" value="<?php echo $producto['id_producto']; ?>">
        </div>
        <div class="form-group">
            <label for="codigo">Codigo Producto SIN</label>
            <input type="text" class="form-control" name="codigoSIN" id="codigoSIN" value="<?php echo $producto['cod_producto_sin']; ?>" >
        </div>
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $producto['nombre_producto']; ?>">
        </div>
        <div class="form-group">
            <label for="precio">Precio del Producto</label>
            <input type="number" step="any" class="form-control" name="precio" id="precio" value="<?php echo $producto['precio_producto']; ?>">
        </div>
        <div class="form-group">
            <label for="">Unidad de Medida</label>
            <input type="text" class="form-control form-control-border" name="Umedida" id="Umedida" value="<?php echo $producto['unidad_medida']; ?>">
        </div>
        <div class="form-group">
            <label for="">Unidad de Medida SIN</label>
            <input type="text" class="form-control form-control-border" name="UmedidaSIN" id="UmedidaSIN" value="<?php echo $producto['unidad_medida_sin']; ?>">
        </div>
        <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen"  onchange="previewImage(event)" value="<?php echo $producto["imagen_producto"]; ?>">
            <center><img id="preview" src="<?php echo $producto["imagen_producto"]; ?>" alt="Vista previa de la imagen" style="display: block; max-width: 150px; margin-top: 20px ;"> </center>
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="estadoDisponible" name="estado" <?php if($producto['disponible'] == "1") echo "checked"; ?> value="1">
                        <label for="estadoDisponible" class="custom-control-label">Disponible</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="estadoNDisponible" name="estado" <?php if($producto['disponible'] == "0") echo "checked"; ?> value="0">
                        <label for="estadoNDisponible" class="custom-control-label">No Disponible</label>
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
function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
          
$(function () { 
    
  $.validator.setDefaults({
    submitHandler: function () {
      editProducto(); // Función que procesa la edición del producto
    }
  });

  $('#FEditProducto').validate({
    rules: {
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
        minlength: 2,
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
