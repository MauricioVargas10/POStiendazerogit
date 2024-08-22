<?php

class ControladorCliente
{
    /*=============================================
    REGISTRO DE CLIENTE
    =============================================*/
    static public function ctrRegCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["razon_social_cliente"])) {
            // Sanitización de datos
            $data = array(
                "razon_social_cliente" => filter_var($_POST["razon_social_cliente"], FILTER_SANITIZE_STRING),
                "nit_ci_cliente" => filter_var($_POST["nit_ci_cliente"], FILTER_SANITIZE_STRING),
                "direccion_cliente" => filter_var($_POST["direccion_cliente"], FILTER_SANITIZE_STRING),
                "nombre_cliente" => filter_var($_POST["nombre_cliente"], FILTER_SANITIZE_STRING),
                "telefono_cliente" => filter_var($_POST["telefono_cliente"], FILTER_SANITIZE_STRING),
                "email_cliente" => filter_var($_POST["email_cliente"], FILTER_SANITIZE_EMAIL)
            );

            $respuesta = ModeloCliente::mdlRegCliente($data);
            echo $respuesta;
        } else {
            echo "Método no permitido o datos faltantes";
        }
    }

    /*=============================================
    MOSTRAR CLIENTES
    =============================================*/
    static public function ctrInfoClientes()
    {
        return ModeloCliente::mdlInfoClientes();
    }

    /*=============================================
    MOSTRAR CLIENTE POR ID
    =============================================*/
    static public function ctrInfoCliente($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return ModeloCliente::mdlInfoCliente($id);
    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/
    static public function ctrEditCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id_cliente"])) {
            // Sanitización de datos
            $data = array(
                "id_cliente" => filter_var($_POST["id_cliente"], FILTER_SANITIZE_NUMBER_INT),
                "razon_social_cliente" => filter_var($_POST["razon_social_cliente"], FILTER_SANITIZE_STRING),
                "nit_ci_cliente" => filter_var($_POST["nit_ci_cliente"], FILTER_SANITIZE_STRING),
                "direccion_cliente" => filter_var($_POST["direccion_cliente"], FILTER_SANITIZE_STRING),
                "nombre_cliente" => filter_var($_POST["nombre_cliente"], FILTER_SANITIZE_STRING),
                "telefono_cliente" => filter_var($_POST["telefono_cliente"], FILTER_SANITIZE_STRING),
                "email_cliente" => filter_var($_POST["email_cliente"], FILTER_SANITIZE_EMAIL)
            );

            $respuesta = ModeloCliente::mdlEditCliente($data);
            echo $respuesta;
        } else {
            echo "Método no permitido o datos faltantes";
        }
    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/
    static public function ctrEliCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id_cliente"])) {
            $id = filter_var($_POST["id_cliente"], FILTER_SANITIZE_NUMBER_INT);
            $respuesta = ModeloCliente::mdlEliCliente($id);
            echo $respuesta;
        } else {
            echo "Método no permitido o datos faltantes";
        }
    }
}
?>
