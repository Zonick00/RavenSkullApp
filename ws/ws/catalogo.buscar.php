<?php

require_once '../logica/Catalogo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';


        $objCatalogo = new Catalogo();
        $p_id_catalogo = $_REQUEST["p_id_catalogo"];
        $resultado = $objCatalogo->BuscarItem($p_id_catalogo);
        for($i=0; $i<count($resultado); $i++){
            $id = $resultado[$i]["id_catalogo"];
            $foto = $objCatalogo->obtenerFoto($id);
            $resultado[$i]["foto"] = $foto; 
        } 
        
        Funciones::imprimeArrayJSON(200, "", $resultado);
/*
if (! isset($_REQUEST["token"])){
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
    
        
try {
    if(validarToken($_REQUEST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objCatalogo = new Catalogo();
        $resultado = $objCatalogo->ObtenerItem();
        for($i=0; $i<count($resultado); $i++){
            $id = $resultado[$i]["id_item"];
            $foto = $objCatalogo->obtenerFoto($id);
            $resultado[$i]["foto"] = $foto; 
        }
        Funciones::imprimeJSON(200, "", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeJSON(500,$exc->getMessage(),"");
}*/
