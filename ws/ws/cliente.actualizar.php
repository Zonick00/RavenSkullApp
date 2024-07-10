<?php
require_once '../logica/Cliente.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["p_customerId"]) || ! isset($_POST["p_name"])){
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
        $objCliente = new Cliente();
        
        $p_customerId = $_POST["p_customerId"];
        $p_name = $_POST["p_name"];
        $p_lastname = $_POST["p_lastname"];
        $p_dni = $_POST["p_dni"];
        $p_address = $_POST["p_address"];
        $p_phone = $_POST["p_phone"];
        
        $resultado = $objCliente->actualizarCliente($p_customerId, $p_name, $p_lastname, $p_dni, $p_address, $p_phone);
        
        Funciones::imprimeArrayJSON(200, "Cliente actualizado con éxito", $resultado);
    }                                           
} catch (Exception $exc) {
    Funciones::imprimeArrayJSON(500,$exc->getMessage(),"");
} 
