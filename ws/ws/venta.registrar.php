<?php
require_once '../logica/Venta.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_datetime"]) || !isset($_POST["p_shipping"]) || !isset($_POST["p_shipping_cost"]) || !isset($_POST["p_order_address"]) || !isset($_POST["p_discount"]) || !isset($_POST["p_customerId"]) || !isset($_POST["p_userId"]) || !isset($_POST["det_ped"])){
    Funciones::imprimeArrayJSON(500,"Debe especificar los datos requeridos", "");
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
        
        $p_datetime = $_POST["p_datetime"];
        $p_shipping = $_POST["p_shipping"];
        $p_shipping_cost = $_POST["p_shipping_cost"];
        $p_order_address = $_POST["p_order_address"];
        $p_discount = $_POST["p_discount"];
        $p_customerId = $_POST["p_customerId"];
        $p_userId = $_POST["p_userId"];
        $det_ped = $_POST["det_ped"];
        
        $resultado = $objVenta->registrarVenta($p_datetime, $p_shipping, $p_shipping_cost, $p_order_address, $p_discount, $p_customerId, $p_userId, $det_ped);
        
        Funciones::imprimeArrayJSON(200, "Se registro la venta correctamente", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}