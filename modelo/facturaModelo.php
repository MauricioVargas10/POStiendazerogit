<?php
require_once "conexion.php";
class ModeloFactura{


    static public function mdlInfoFacturas(){
        $stmt=Conexion::conectar()->prepare("SELECT id_factura, cod_factura, razon_social_cliente, fecha_emision, total, estado_factura, cuf
        FROM factura JOIN cliente ON cliente.id_cliente=factura.id_cliente");
        $stmt->execute();

        return $stmt->fetchAll();

    /* $stmt->closeCursor();
    $stmt-->null; */
    }

    static public function mdlRegFactura($data){
        $codFactura=$data["codFactura"];
        $cliente=$data["cliente"];
        $detalle=$data["detalle"];
        $neto=$data["neto"];
        $descuento=$data["descuento"];
        $total=$data["total"];
        $fechaEmision=$data["fechaEmision"];
        $cufd=$data["cufd"];
        $cuf=$data["cuf"];
        $xml=$data["xml"];
        $idUsuario=$data["idUsuario"];
        $usuario=$data["usuario"];
        $leyenda=$data["leyenda"];

        $stmt=Conexion::conectar()->prepare("insert into factura(cod_factura, id_cliente, detalle, neto, descuento, total,
        fecha_emision, cufd, cuf, xml, id_usuario, usuario, leyenda)
        values('$codFactura', '$cliente', '$detalle', '$neto', '$descuento', '$total', '$fechaEmision', '$cufd', '$cuf', '$xml', '$idUsuario',
        '$usuario', '$leyenda')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

    static public function mdlInfoFactura($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM factura JOIN cliente ON cliente.id_cliente=factura.id_cliente WHERE id_factura=$id");
        $stmt->execute();

        return $stmt->fetch();

        /* stmt->close();
        $stmt->null;  */
    }

 
    static public function mdlEditFactura($data){
        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"]; 

        $stmt=Conexion::conectar()->prepare("update factura set password='$password', perfil='$perfil',
        estado='$estado' where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }
  /* 
        $stmt->close();
        $stmt->null();
  */
}

    static public function mdlAnularFactura($cuf){

        $stmt=Conexion::conectar()->prepare("update factura set estado_factura=0 where cuf='$cuf'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    

    static public function mdlNumFactura(){
    $stmt=Conexion::conectar()->prepare("select max(id_factura) from factura");
    $stmt->execute();
    return $stmt->fetch();

    /* $stmt->close();
    $stmt-->null; */

    }

    static public function mdlNuevoCufd($data){
        
        $cufd=$data["cufd"];
        $fechaVigCufd=$data["fechaVigCufd"];
        $codControlCufd=$data["codControlCufd"];

        $stmt=Conexion::conectar()->prepare("insert into cufd(codigo_cufd, codigo_control, fecha_vigencia)
        values('$cufd', '$codControlCufd', '$fechaVigCufd')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
    $stmt->null();

    }
    static public function mdlUltimoCufd(){

        $stmt=Conexion::conectar()->prepare("select * from cufd where id_cufd=(select max(id_cufd) from cufd)");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null; 
    }

    static public function mdlLeyenda(){

        $stmt=Conexion::conectar()->prepare("select * from leyenda order by rand() limit 1");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }
    static public function mdlCantidadVentas(){
        $stmt=Conexion::conectar()->prepare("select count(*) as venta from factura");
        $stmt->execute();
    
        return $stmt->fetch();
    
        /*   $stmt->close();
        $stmt->null; */ 
    }
}  