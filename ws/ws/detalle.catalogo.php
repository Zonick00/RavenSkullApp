<?php
require_once '../logica/Pedido.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_REQUEST["p_idPedido"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

try {
    
    $objDetalle = new Pedido();
    $p_idPedido = $_REQUEST["p_idPedido"];
        
    $resultado = $objDetalle->DetalleCatalogo($p_idPedido);
        
    Funciones::imprimeArrayJSON(200, "", $resultado);

    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}