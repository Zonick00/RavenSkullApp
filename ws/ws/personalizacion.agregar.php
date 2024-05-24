<?php

require_once '../logica/Personalizacion.clase.php';
require_once '../util/funciones/Funciones.clase.php';

try {
    
    $objPersonalizacion = new Personalizacion();

    $id_usuario = $_REQUEST["p_id_usuario"];
    $p_forma = $_REQUEST["p_forma"];
    $p_piso = $_REQUEST["p_piso"];
    $p_relleno = $_REQUEST["p_relleno"];
    $p_sabor = $_REQUEST["p_sabor"];
    $p_dimension = $_REQUEST["p_dimension"];
    $p_colorcake = $_REQUEST["p_colorcake"];
    $p_colorborde = $_REQUEST["p_colorborde"];
    $p_borde = $_REQUEST["p_borde"];
    $p_imagen = $_REQUEST["p_imagen"];
    $p_objeto = $_REQUEST["p_objeto"];
    $p_cantidad = $_REQUEST["p_cantidad"];
    $p_precio = $_REQUEST["p_precio"];
    $p_id_pedido = $_REQUEST["p_id_pedido"];
        
    $resultado = $objPersonalizacion->registrarPersonalizacion($id_usuario, $p_forma, $p_piso, $p_relleno, $p_sabor, $p_dimension, $p_colorcake, $p_colorborde, $p_borde, $p_imagen, $p_objeto, $p_cantidad, $p_precio, $p_id_pedido);
        
    Funciones::imprimeJSON($resultado);

    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}

