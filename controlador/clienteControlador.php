<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegCliente" ||
    $ruta["query"] == "ctrEditCliente" ||
    $ruta["query"] == "ctrBusCliente" ||
    $ruta["query"] == "ctrEliCliente"
  ) {
    $metodo = $ruta["query"];
    $cliente = new ControladorCliente();
    $cliente->$metodo();
  }
}

class ControladorCliente
{
  static public function ctrInfoClientes()
  {
    $respuesta = ModeloCliente::mdlInfoClientes();
    return $respuesta;
  }

  static public function ctrRegCliente()
  {
    require "../modelo/clienteModelo.php";

    $data = array(
      "razonCliente" => $_POST["rsocial"],
      "nitCliente" => $_POST["nit"],
      "direccionCliente" => $_POST["direccion"],
      "nombreCliente" => $_POST["nombre"],
      "telefonoCliente" => $_POST["telefono"],
      "gmailCliente" => $_POST["gmail"]
    );

    $respuesta = ModeloCliente::mdlRegCliente($data);

    echo $respuesta;
  }

  static public function ctrInfoCliente($id)
  {
    $respuesta = ModeloCliente::mdlInfoCliente($id);
    return $respuesta;
  }

  static function ctrEditCliente(){
    require "../modelo/clienteModelo.php";

    $data = array(
      "id" => $_POST["idCliente"],
      "razonCliente" => $_POST["rsocial"],
      "nitCliente" => $_POST["nit"],
      "direccionCliente" => $_POST["direccion"],
      "nombreCliente" => $_POST["nombre"],
      "telefonoCliente" => $_POST["telefono"],
      "gmailCliente" => $_POST["gmail"]
    );

    ModeloCliente::mdlEditCliente($data);
    $respuesta = ModeloCliente::mdlEditCliente($data);

    echo $respuesta;
  }

  static function ctrEliCliente(){
    require "../modelo/clienteModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloCliente::mdlEliCliente($id);
    echo $respuesta;
  }

  static function ctrBusCliente(){
    require "../modelo/clienteModelo.php";
    $nitCliente=$_POST["nitCliente"];

    $respuesta=ModeloCliente::mdlBusCliente($nitCliente);
    echo json_encode($respuesta);

  }
  static public function ctrCantidadClientes(){

    $respuesta=ModeloCliente::mdlCantidadClientes();
    return ($respuesta);
    //echo $respuesta;
}
}