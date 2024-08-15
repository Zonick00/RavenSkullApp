<?php
require_once '../logica/Usuario.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_state"]) || !isset($_POST["p_userId"])){
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
        $objUsuario = new Usuario();
        
        $p_state = $_POST["p_state"];
        $p_userId = $_POST["p_userId"];
        
        $resultado = $objUsuario->cambiarEstadoUsuario($p_state, $p_userId);
        
        Funciones::imprimeArrayJSON(200, "Se actualizo el estado del usuario satisfactoriamente", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}