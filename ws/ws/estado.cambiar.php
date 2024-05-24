<?php
require_once '../logica/Pedido.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_REQUEST["p_id_pedido"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

try {
    
    $objDetalle = new Pedido();
    $id_pedido = $_REQUEST["p_id_pedido"];
        
    $resultado = $objDetalle->CambiarEstadoFinalizado($id_pedido);
        
    Funciones::imprimeJSON("estado finalizado");

    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}