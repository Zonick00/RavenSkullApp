<?php
require_once '../logica/Cliente.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_customerId"])){
    Funciones::imprimeArrayJSON(500,"Debe especificar un id de cliente válido", "");
    exit();
}

if (! isset($_POST["token"])){
    Funciones::imprimeArrayJSON(500, "Debe especificar un token", "");
    exit();
}
    
try {
    if(validarToken($_POST["token"])){
        //si devuelve true, quiere decir q el token es valido
        $objCliente = new Cliente();
        
        $p_customerId = $_POST["p_customerId"];
        
        $resultado = $objCliente->buscarCliente($p_customerId);
        
        Funciones::imprimeArrayJSON(200, "Cliente encontrado", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}
