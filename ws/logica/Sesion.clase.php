<?php

require_once '../datos/Conexion.clase.php';

class Sesion extends Conexion {
    private $email;
    private $clave;

    function getClave() {
        return $this->clave;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    public function validarSesion() {
        try {
            $sql = "select * from f_validar_cliente(:p_email, md5(:p_clave))";
            
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_usuario", $this->getUsuario());
            //$sentencia->bindParam(":p_clave", $this->getClave());
            $sentencia->execute(array(":p_email"=> $this->getEmail(), ":p_clave"=> $this->getClave()));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }


}
