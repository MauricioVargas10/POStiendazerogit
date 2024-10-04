<?php
require_once "conexion.php";
class ModeloProducto{

    static public function mdlAccesoProducto($producto){
    $stmt=Conexion::conectar()->prepare("select * from producto where cod_producto='$producto'");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->closeCursor();
    $stmt-->null;

    }
    static public function mdlInfoProductos(){
    $stmt=Conexion::conectar()->prepare("select * from producto ");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->closeCursor();
    $stmt-->null;
    }

    static public function mdlRegProducto($data){
        $codigo=$data["codigoProducto"];
        $codigoSIN=$data["codigoProductoSIN"];
        $nombre=$data["nombreProducto"];
        $precio=$data["precioProducto"];
        $Uproducto=$data["unidadProducto"];
        $UproductoSIN=$data["unidadProductoSIN"];
        $Iproducto=$data["imagenProducto"];
        $tpm_name = $data["imagen_temp"];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $carpeta="../assest/dist/img/productos/";
            move_uploaded_file($tpm_name, $carpeta.$Iproducto);
            $ruta_imagen="assest/dist/img/productos/".$Iproducto;
        } else {
            $ruta_imagen = " ";
        }

        $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto,cod_producto_sin,nombre_producto,precio_producto,unidad_medida,unidad_medida_sin,imagen_producto)
                                                           values('$codigo',' $codigoSIN','$nombre','$precio','$Uproducto','$UproductoSIN','$ruta_imagen')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->closeCursor();
        $stmt-->null;
    }

   
      static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        $stmt->closeCursor();
        $stmt-->null;
    }
    static public function mdlEditProducto($data)
    {

        $codigo_p = $data["codigoProducto"];
        $codigo_pSIN = $data["codigoProductoSIN"];
        $nombre = $data["nombreProducto"];  
        $precio = $data["precioProducto"];  
        $unidad = $data["unidadProducto"];
        $unidadSIN = $data["unidadProductoSIN"];  
        $imagen = $data["imagen"];  
        $tpm_name = $data["imagen_temp"];
        $disponibilidad=$data["estado"];
        $id = $data["id"];

        if ($data["img"] == "null") {
            $stmt = Conexion::conectar()->prepare("update producto set cod_producto='$codigo_p',cod_producto_sin='$codigo_pSIN', nombre_producto='$nombre', precio_producto='$precio', unidad_medida='$unidad', unidad_medida_sin='$unidadSIN',  disponible='$disponibilidad' where id_producto='$id'");
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } else{
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $carpeta="../assest/dist/img/productos/";
                move_uploaded_file($tpm_name, $carpeta.$imagen);
                $ruta_imagen="assest/dist/img/productos/".$imagen;
            } else {
                $ruta_imagen = " ";
            }
            
            $stmt = Conexion::conectar()->prepare("update producto set cod_producto='$codigo_p',cod_producto_sin='$codigo_pSIN', nombre_producto='$nombre', precio_producto='$precio', unidad_medida='$unidad', unidad_medida_sin='$unidadSIN', imagen_producto='$ruta_imagen', disponible='$disponibilidad' where id_producto='$id'");
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }
        
    }

    static public function mdlEliProducto($id){

        $stmt=Conexion::conectar()->prepare("delete from producto where id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->closeCursor();
        $stmt-->null;
    }

    static public function mdlBusProducto($cod){

       /*  console.log($cod); */
        $stmt=Conexion::conectar()->prepare("select * from producto where cod_producto='$cod'");
        $stmt->execute();

        return $stmt->fetch();
    
        $stmt->close();
        $stmt->null; 
       
    }
    static public function mdlCantidadProductos(){
        $stmt=Conexion::conectar()->prepare("select count(*) as producto from producto");
        $stmt->execute();
    
        return $stmt->fetch();
    
        /*   $stmt->close();
        $stmt->null; */ 
    }
}   