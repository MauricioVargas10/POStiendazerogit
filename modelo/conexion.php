<?php
class Conexion{
    static public function conectar(){
        $host="localhost";
        $db="pos";
        $userDB="root";
        $passSB="";

        $link=new PDO("mysql:host=".$host.";"."dbname=".$db, $userDB, $passSB);
        $link->exec("set names 'utf8'");
        return $link;
    }
}