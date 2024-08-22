<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de clientes registrados</h3>
          <button class="btn btn-primary float-right" onclick="MNuevoCliente()">Nuevo Cliente</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Razón Social</th>
                <th>NIT/CI</th>
                <th>Dirección</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $clientes = ControladorCliente::ctrInfoClientes();
              foreach ($clientes as $value) {
              ?>
              <tr>
                <td><?php echo $value["id_cliente"]; ?></td>
                <td><?php echo $value["razon_social_cliente"]; ?></td>
                <td><?php echo $value["nit_ci_cliente"]; ?></td>
                <td><?php echo $value["direccion_cliente"]; ?></td>
                <td><?php echo $value["nombe_cliente"]; ?></td>
                <td><?php echo $value["telefono_cliente"]; ?></td>
                <td><?php echo $value["email_cliente"]; ?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-secondary" onclick="MEditCliente(<?php echo $value['id_cliente']; ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" onclick="MEliCliente(<?php echo $value['id_cliente']; ?>)">
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
      </div>
    </div>
  </div>
</div>
