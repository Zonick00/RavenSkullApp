<?php
require_once '../logica/Venta.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_userId"])){
    Funciones::imprimeArrayJSON(500, "Debe completar los datos requeridos", "");
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
        
        $p_userId = $_POST["p_userId"];
        
        $resultado = $objVenta->listarVentasPorUsuario($p_userId);
        
        Funciones::imprimeArrayJSON(200, "", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}  