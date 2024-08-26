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
    $stmt=Conexion::conectar()->prepare("select * from producto");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->closeCursor();
    $stmt-->null;
    }

    static public function mdlRegProducto($data){
        $codigo=$data["codigoProducto"];
        $nombre=$data["nombreProducto"];
        $precio=$data["precioProducto"];
        $Uproducto=$data["unidadProducto"];
        $Iproducto=$data["imagenProducto"];
        $tpm_name = $data["imagen_temp"];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $carpeta="../assest/dist/img/productos/";
            move_uploaded_file($tpm_name, $carpeta.$Iproducto);
            $ruta_imagen="assest/dist/img/productos/".$Iproducto;
        } else {
            $ruta_imagen = " ";
        }

        $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto,nombre_producto,precio_producto,unidad_medida,imagen_producto)
                                                           values('$codigo','$nombre','$precio','$Uproducto','$ruta_imagen')");

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
        $nombre = $data["nombreProducto"];  
        $precio = $data["precioProducto"];  
        $unidad = $data["unidadProducto"];  
        $imagen = $data["imagen"];  
        $tpm_name = $data["imagen_temp"];
        $disponibilidad=$data["estado"];
        $id = $data["id"];

        if ($data["img"] == "null") {
            $stmt = Conexion::conectar()->prepare("update producto set cod_producto='$codigo_p', nombre_producto='$nombre', precio_producto='$precio', unidad_medida='$unidad',  disponible='$disponibilidad' where id_producto='$id'");
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
            
            $stmt = Conexion::conectar()->prepare("update producto set cod_producto='$codigo_p', nombre_producto='$nombre', precio_producto='$precio', unidad_medida='$unidad', imagen_producto='$ruta_imagen', disponible='$disponibilidad' where id_producto='$id'");
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }
        
    }

    
    // static public function mdlEditProducto($data){
    //     // var_dump($data);
    //     $codigo=$data["codigoProducto"];
    //     $nombre=$data["nombreProducto"];
    //     $precio=$data["precioProducto"];
    //     $Uproducto=$data["unidadProducto"];
    //     $Iproducto=$data["imagenProducto"];
    //     $tpm_name = $data["imagen_temp"];
    //     $estado=$data["estado"];
    //     $id=$data["id"];

    //     $stmt=Conexion::conectar()->prepare("update producto set cod_producto='$codigo', nombre_producto='$nombre', precio_producto='$precio', unidad_medida='$Uproducto', imagen_producto='$Iproducto', disponible='$estado' where id_producto=$id");

    //     if($stmt->execute()){
    //         return "ok";
    //     }else{
    //         return "error";
    //     }
    //     $stmt->closeCursor();
    //     $stmt-->null;
    // }
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
}   