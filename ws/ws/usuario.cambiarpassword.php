<?php
require_once '../logica/Usuario.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_password"]) || !isset($_POST["p_userId"])){
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
        
        $p_password = $_POST["p_password"];
        $p_userId = $_POST["p_userId"];
        
        $resultado = $objUsuario->cambiarPasswordUsuario($p_password, $p_userId);
        
        Funciones::imprimeArrayJSON(200, "Se actualizó contraseña!", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
}