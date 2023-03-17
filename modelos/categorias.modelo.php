<?php
require_once "conexion.php";

class ModeloCategorias{
    static public function mdlMostrarCategorias(){
        $stmt = Conexion::conectar()-> prepare("SELECT id,nombrearbol,tipo,descripcion,altura,'X' as acciones FROM categorias");
        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt = null;
    }
}

$categorias = ModeloCategorias::mdlMostrarCategorias();
print_r($categorias);