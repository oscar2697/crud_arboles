<?php
class ControladorCategoria{
    static public function ctrMostarCategorias(){
        $respuesta = ModeloCategorias::mdlMostrarCategorias();
        return $respuesta;
    }
}