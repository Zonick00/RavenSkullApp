<?php
require_once '../logica/Producto.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_name"]) || ! isset($_POST["p_price"]) || ! isset($_POST["p_wholesale"]) || ! isset($_POST["p_sold"]) || ! isset($_POST["p_stock"]) || ! isset($_POST["p_image"]) || ! isset($_POST["p_category"])){
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
        
        $p_name = $_POST["p_name"];
        $p_price = $_POST["p_price"];
        $p_wholesale = $_POST["p_wholesale"];
        $p_sold = $_POST["p_sold"];
        $p_stock = $_POST["p_stock"];
        $p_image = $_POST["p_image"];
        $p_category = $_POST["p_category"];
        
        $resultado = $objProducto->registrarProducto($p_name, $p_price, $p_wholesale, $p_sold, $p_stock, $p_image, $p_category);
        
        Funciones::imprimeArrayJSON(200, "", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
