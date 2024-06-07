<?php
require_once '../logica/Producto.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_productoId"])){
    Funciones::imprimeArrayJSON(500,"Debe especificar un id de producto", "");
    exit();
}

if (! isset($_POST["token"])){
    Funciones::imprimeArrayJSON(500, "Debe especificar un token", "");
    exit();
}
    
try {
    if(validarToken($_POST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objProducto = new Producto();
        
        $p_productoId = $_POST["p_productoId"];
        
        $resultado = $objProducto->buscarProducto($p_productoId);
        
        Funciones::imprimeArrayJSON(200, "Producto encontrado", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
