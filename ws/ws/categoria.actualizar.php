<?php
require_once '../logica/Categoria.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_name"]) || ! isset($_POST["p_categoryId"])){
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
        $objCategoria = new Categoria();
        
        $p_name = $_POST["p_name"];
        $p_categoryId = $_POST["p_categoryId"];
        
        $resultado = $objCategoria->actualizarCategoria($p_name, $p_categoryId);
        
        Funciones::imprimeArrayJSON(200, "Categoria actualizada con éxito", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
