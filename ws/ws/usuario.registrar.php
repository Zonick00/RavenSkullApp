<?php

require_once '../logica/Usuario.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_REQUEST["p_email"]) || ! isset($_REQUEST["p_clave"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

try {
    
    $objUsuario = new Usuario();
    $p_email = $_REQUEST["p_email"];
    $p_clave = $_REQUEST["p_clave"];
    $p_nombres = $_REQUEST["p_nombres"];
    $p_apellidos = $_REQUEST["p_apellidos"];
    $p_direccion = $_REQUEST["p_direccion"];
    $p_telefono = $_REQUEST["p_telefono"];
    $p_fecha_nac = $_REQUEST["p_fecha_nac"];
    $p_sexo = $_REQUEST["p_sexo"];
        
    $resultado = $objUsuario->registrarUsuario($p_email, $p_clave, $p_nombres, $p_apellidos, $p_direccion, $p_telefono, $p_fecha_nac, $p_sexo);
        
    Funciones::imprimeJSON($resultado);

    
} catch (Exception $exc) {
    Funciones::imprimeJSON($exc->getMessage());
}