<?php

require_once '../logica/Catalogo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';


        $objCatalogo = new Catalogo();
        $objCatalogo->setId_usuario($_POST["id_usuario"]);
        $objCatalogo->setDetalle_catalogo($_POST["detalle_catalogo"]);
        
        $resultado = $objCatalogo->Agregar();
        
        Funciones::imprimeArrayJSON(200, "REGISTRO EXITOSO", $resultado);
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
