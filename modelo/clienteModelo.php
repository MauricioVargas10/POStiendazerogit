<?php
require_once "conexion.php";
class ModeloCliente{


    static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();
    
    return $stmt->fetchAll();

    // $stmt->closeCursor();
    // $stmt-->null;
    }

    static public function mdlRegCliente($data){
        $rsocial=$data["razonCliente"];
        $nit=$data["nitCliente"];
        $direccion=$data["direccionCliente"];
        $nombre=$data["nombreCliente"];
        $telefono=$data["telefonoCliente"];
        $gmail=$data["gmailCliente"];

        $stmt=Conexion::conectar()->prepare("insert into cliente(razon_social_cliente,nit_ci_cliente,direccion_cliente,nombre_cliente,telefono_cliente,email_cliente)values('$rsocial','$nit','$direccion','$nombre','$telefono','$gmail')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }



   
      static public function mdlInfoCliente($id){
        $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEditCliente($data){
        // var_dump($data);
        $rsocial=$data["razonCliente"];
        $nit=$data["nitCliente"];
        $direccion=$data["direccionCliente"];
        $nombre=$data["nombreCliente"];
        $telefono=$data["telefonoCliente"];
        $gmail=$data["gmailCliente"];
        $id=$data["id"];
        $stmt=Conexion::conectar()->prepare("update cliente set razon_social_cliente='$rsocial',nit_ci_cliente='$nit',direccion_cliente='$direccion',nombre_cliente='$nombre',telefono_cliente='$telefono',email_cliente='$gmail' where id_cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEliCliente($id){

        $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }


    static public function mdlBusCliente($nitCliente){
        $stmt=Conexion::conectar()->prepare("select * from cliente where nit_ci_cliente=$nitCliente");
        $stmt->execute();
        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }
    static public function mdlCantidadClientes(){
        $stmt=Conexion::conectar()->prepare("select count(*) as cliente from cliente");
        $stmt->execute();
    
        return $stmt->fetch();
    
        /*   $stmt->close();
        $stmt->null; */ 
    }
}   