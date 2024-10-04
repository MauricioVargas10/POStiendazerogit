<?php
    $ruta=parse_url($_SERVER["REQUEST_URI"]);
    // var_dump($ruta);

    if(isset($ruta["query"])){
        if($ruta["query"]=="ctrRegProducto" || 
            $ruta["query"]=="ctrEditProducto"|| 
            $ruta["query"]=="ctrBusProducto"|| 
            $ruta["query"]=="ctrEliProducto"){
            $metodo=$ruta["query"];
            $producto=new ControladorProducto();
            $producto->$metodo();
        }
    }

class ControladorProducto{


    static public function ctrInfoProductos(){
        $respuesta=ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }
    static public function ctrRegProducto(){
        require "../modelo/productoModelo.php";

        $data=array(
            "codigoProducto"=>$_POST["codigo"],
            "codigoProductoSIN"=>$_POST["codigoSIN"],
            "nombreProducto"=>$_POST["nombre"],
            "precioProducto"=>$_POST["precio"],
            "unidadProducto"=>$_POST["Umedida"],
            "unidadProductoSIN"=>$_POST["UmedidaSIN"],
            "imagenProducto"=>$_FILES["imagen"]["name"],
            "imagen_temp" => $_FILES["imagen"]["tmp_name"]
        );
        $respuesta=ModeloProducto::mdlRegProducto($data);
        echo $respuesta;
    }
    static public function ctrInfoProducto($id){
        $respuesta=ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }

    static function ctrEditProducto(){
        require "../modelo/productoModelo.php";

        if ($_FILES["imagen"]["name"] == "") {
            $data = array(
            "id" => $_POST["idProducto"], 
            "codigoProducto" => $_POST["codigo"],
            "codigoProductoSIN" => $_POST["codigoSIN"],  
            "nombreProducto" => $_POST["nombre"], 
            "precioProducto" => $_POST["precio"], 
            "unidadProducto" => $_POST["Umedida"],
            "unidadProductoSIN" => $_POST["UmedidaSIN"], 
            "img" => "null",
            "estado" => $_POST["estado"]
        );
        } else {
            $data = array(
                "id" => $_POST["idProducto"], 
                "codigoProducto" => $_POST["codigo"],
                "codigoProductoSIN" => $_POST["codigoSIN"],   
                "nombreProducto" => $_POST["nombre"], 
                "precioProducto" => $_POST["precio"], 
                "unidadProducto" => $_POST["Umedida"],
                "unidadProductoSIN" => $_POST["UmedidaSIN"], 
                "imagen" => $_FILES["imagen"]["name"], 
                "imagen_temp" => $_FILES["imagen"]["tmp_name"], 
                "estado" => $_POST["estado"]);
        }
        ModeloProducto::mdlEditProducto($data);
        $respuesta = ModeloProducto::mdlEditProducto($data);
        echo $respuesta;
    }

    static public function ctrEliProducto(){
        require "../modelo/productoModelo.php";
        $id=$_POST["id"];

      //  ModeloProducto::mdlEliProducto($id);
        $respuesta=ModeloProducto::mdlEliProducto($id);
        echo $respuesta;
    }

    static public function ctrBusProducto(){
        
        require "../modelo/productoModelo.php";

        $codProducto=$_POST["codProducto"];
        $respuesta=ModeloProducto::mdlBusProducto($codProducto);
        echo json_encode($respuesta);   
    }  
    static public function ctrCantidadProductos(){

        $respuesta=ModeloProducto::mdlCantidadProductos();
        return ($respuesta);
        //echo $respuesta;
    }
    
    }//final////