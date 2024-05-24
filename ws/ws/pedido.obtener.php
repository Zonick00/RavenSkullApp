<?php

require_once '../logica/Pedido.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';


        $objPedido = new Pedido();
        $resultado = $objPedido->ListarPedido();
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
