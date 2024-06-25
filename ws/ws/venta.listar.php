<?php
require_once '../logica/Venta.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["token"])){
    Funciones::imprimeArrayJSON(500, "Debe especificar un token", "");
    exit();
}

try {
    if(validarToken($_POST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objVenta = new Venta();
        
        $resultado = $objVenta->listarVentas();
        
        Funciones::imprimeArrayJSON(200, "", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
