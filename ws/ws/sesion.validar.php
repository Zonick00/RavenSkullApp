<?php

require_once '../logica/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["username"]) || ! isset($_POST["password"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];


try {
    $objSesion = new Sesion();
    $objSesion->setUsername($username);
    $objSesion->setPassword($password);
    $resultado = $objSesion->validarSesion();

    
    if ($resultado["userstate"] == "activo"){
        //unset( $resultado["estado"] );
        
        /*Generar un token de seguridad*/
        require_once 'token.generar.php';
        $token = generarToken(null, 60*60);
        $resultado["token"] = $token;
        /*Generar un token de seguridad*/

        //Funciones::imprimeJSON($resultado);
        Funciones::imprimeJSON($resultado);
    }else{
        Funciones::imprimeJSON($resultado);
    }
    
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON($exc->getMessage());
}