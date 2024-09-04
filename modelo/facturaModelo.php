<?php
require_once "conexion.php";
class ModeloFactura{


    static public function mdlInfoFacturas(){
    $stmt=Conexion::conectar()->prepare("select * from factura");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->closeCursor();
    $stmt-->null;
    }

    static public function mdlRegFactura($data){
        $loginFactura=$data["loginFactura"];
        $password=$data["password"];
        $perfil=$data["perfil"];

        $stmt=Conexion::conectar()->prepare("insert into factura(login_factura,password,perfil)values('$loginFactura','$password','$perfil')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->closeCursor();
        $stmt-->null;
    }

    static public function mdlActualizarAcceso($fechaHora, $id){
        $stmt=Conexion::conectar()->prepare("update factura set ultimo_login='$fechaHora' where id_factura='$id'");
        
        if($stmt->execute()){
          return "ok";
        }else{
          return "error";
        }
      }

   
      static public function mdlInfoFactura($id){
        $stmt=Conexion::conectar()->prepare("select * from factura where id_factura=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        $stmt->closeCursor();
        $stmt-->null;
    }
    static public function mdlEditFactura($data){
        // var_dump($data);
        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update factura set password='$password', perfil='$perfil', estado_factura='$estado' where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->closeCursor();
        $stmt-->null;
    }
    static public function mdlEliFactura($id){

        $stmt=Conexion::conectar()->prepare("delete from factura where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->closeCursor();
        $stmt-->null;
    }

    static public function mdlNumFactura(){
        $stmt=Conexion::conectar()->prepare("select max(id_factura) from factura");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt-->null;

    }
}   