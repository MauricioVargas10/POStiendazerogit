<?php
    require_once "../../controlador/productoControlador.php";
    require_once "../../modelo/productoModelo.php";

    $id = $_GET["id"];
    $producto = ControladorProducto::ctrInfoProducto($id);
?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
            <div class="col-sm-12">
            <center>
                <img id="preview" src="<?php echo $producto["imagen_producto"]; ?>" alt="Vista previa de la imagen" style="width: 350px;" class="img-thumbnail">
            </center>
            </div>
                <tr>
                    <th>Cod. Producto</th>
                    <td><?php echo $producto['cod_producto']; ?></td>
                </tr>
                <tr>
                    <th>Cod. producto SIN</th>
                    <td><?php echo $producto['cod_producto_sin']; ?></td>
                </tr>
                <tr>
                    <th>Nombre del producto</th>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                </tr>
                <tr>
                    <th>Precio producto</th>
                    <td><?php echo $producto['precio_producto']; ?></td>
                </tr>
                <tr>
                    <th>Unidad medida</th>
                    <td><?php echo $producto['unidad_medida']; ?></td>
                </tr>
                <tr>
                    <th>Unidad medida SIN</th>
                    <td><?php echo $producto['unidad_medida_sin']; ?></td>
                </tr>
            </table> 
        </div>

    </div>
</div>
