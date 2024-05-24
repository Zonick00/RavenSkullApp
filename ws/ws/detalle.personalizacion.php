<?php

require_once '../logica/Pedido.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_REQUEST["p_idPersonalizacion"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

try {
    
    $objDetalle = new Pedido();
    $p_idPersonalizacion = $_REQUEST["p_idPersonalizacion"];
        
    $resultado = $objDetalle->DetallePersonalizacion($p_idPersonalizacion);
    
    Funciones::imprimeArrayJSON(200, "", $resultado);

    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}