<?php
require_once '../logica/Insumo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_suppliesId"]) || ! isset($_POST["p_name"]) || ! isset($_POST["p_stock"]) ){
    Funciones::imprimeArrayJSON(500,"Falta completar los datos requeridos", "");
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
        
        $p_name = $_POST["p_name"];
        $p_stock = $_POST["p_stock"];
        $p_priceBuy = $_POST["p_priceBuy"];
        $p_addressBuy = $_POST["p_addressBuy"];
        $p_phoneBuy = $_POST["p_phoneBuy"];
        $p_suppliesId = $_POST["p_suppliesId"];
        
        $resultado = $objInsumo->actualizarInsumo($p_name, $p_stock, $p_priceBuy, $p_addressBuy, $p_phoneBuy, $p_suppliesId);
        
        Funciones::imprimeArrayJSON(200, "Insumo actualizado con éxito", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
} 
