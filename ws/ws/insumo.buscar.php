<?php
require_once '../logica/Insumo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_suppliesId"])){
    Funciones::imprimeArrayJSON(500,"Debe especificar un id de insumo válido", "");
    exit();
}

if (! isset($_POST["token"])){
    Funciones::imprimeArrayJSON(500, "Debe especificar un token", "");
    exit();
}
    
try {
    if(validarToken($_POST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objInsumo = new Insumo();
        $p_suppliesId = $_POST["p_suppliesId"];
        
        $resultado = $objInsumo->buscarInsumos($p_suppliesId);
        
        Funciones::imprimeArrayJSON(200, "Insumo encontrado", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}