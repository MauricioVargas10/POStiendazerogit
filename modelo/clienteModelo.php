<?php

class ModeloCliente
{
    static public function mdlRegCliente($data)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, email_cliente) VALUES (:razon_social_cliente, :nit_ci_cliente, :direccion_cliente, :nombre_cliente, :telefono_cliente, :email_cliente)");
        
        $stmt->bindParam(":razon_social_cliente", $data["razon_social_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nit_ci_cliente", $data["nit_ci_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_cliente", $data["direccion_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_cliente", $data["nombre_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_cliente", $data["telefono_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email_cliente", $data["email_cliente"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlInfoClientes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlInfoCliente($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE id_cliente = :id_cliente");
        $stmt->bindParam(":id_cliente", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlEditCliente($data)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE clientes SET razon_social_cliente = :razon_social_cliente, nit_ci_cliente = :nit_ci_cliente, direccion_cliente = :direccion_cliente, nombre_cliente = :nombre_cliente, telefono_cliente = :telefono_cliente, email_cliente = :email_cliente WHERE id_cliente = :id_cliente");
        
        $stmt->bindParam(":razon_social_cliente", $data["razon_social_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nit_ci_cliente", $data["nit_ci_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_cliente", $data["direccion_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_cliente", $data["nombre_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_cliente", $data["telefono_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email_cliente", $data["email_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cliente", $data["id_cliente"], PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliCliente($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
        $stmt->bindParam(":id_cliente", $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
?>
