
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de productos registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Disponible</th>
                    <td>
                        <button class="btn btn-primary" style="width: 100%;" onclick="MNuevoProducto()">Nuevo</button>
                    </td>
                  </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $producto=ControladorProducto::ctrInfoProductos();
                    // var_dump($producto);
                    foreach ($producto as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["id_producto"];?></td>
                        <td><?php echo $value["cod_producto"];?></td>
                        
                        <td><?php echo $value["nombre_producto"];?></td>
                        <td><?php echo $value["precio_producto"];?></td>
                     
                        <td> <img src="<?php echo $value["imagen_producto"];?>" width=150px height=auto "></td>
                        <td><?php 
                        
                            if ($value["disponible"]=="1") {
                              ?>
                              <span class="badge badge-success">Disponible</span>
                              <?php 
                            }else {
                              ?>
                              <span class="badge badge-danger">No Disponible</span>
                              <?php
                            }?>
                        </td>

                        <td>
                            <div class="btn-group" style="width: 100%;">
                                <button class="btn btn-info"  style="width: 50%;" onclick="MVerProducto(<?php echo $value["id_producto"];?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary"  style="width: 50%;" onclick="MEditProducto(<?php echo $value["id_producto"];?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" style="width: 50%;" onclick="MEliProducto(<?php echo $value["id_producto"];?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
 
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                </tbody>
             </table>
            </div>
              <!-- /.card-body -->
       </div>
            <!-- /.card -->
       </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

