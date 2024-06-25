<?php
require_once '../logica/Venta.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_orderId"])){
    Funciones::imprimeArrayJSON(500,"Debe especificar un id de venta válido", "");
    exit();
}

if (! isset($_POST["token"])){
    Funciones::imprimeArrayJSON(500, "Debe especificar un token", "");
    exit();
}
    
try {
    if(validarToken($_POST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objVenta = new Venta();
        
        $p_orderId = $_POST["p_orderId"];
        
        $resultado = $objVenta->buscarVenta($p_orderId);
        
        Funciones::imprimeArrayJSON(200, "Venta encontrada", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}