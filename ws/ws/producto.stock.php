<?php
require_once '../logica/Producto.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_productoId"]) || ! isset($_POST["p_stock"])){
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
        $objProducto = new Producto();
        
        $p_productoId = $_POST["p_productoId"];
        $p_stock = $_POST["p_stock"];
        
        $resultado = $objProducto->actualizarStock($p_productoId, $p_stock);
        
        Funciones::imprimeArrayJSON(200, "Stock del Producto actualizado con éxito", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
