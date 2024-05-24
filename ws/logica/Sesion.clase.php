<?php

require_once '../datos/Conexion.clase.php';

class Sesion extends Conexion {
    private $username;
    private $password;

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    
    public function validarSesion() {
        try {
            $sql = "select * from f_user_login(:p_username, md5(:p_password))";
            
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_usuario", $this->getUsuario());
            //$sentencia->bindParam(":p_clave", $this->getClave());
            $sentencia->execute(array(":p_username"=> $this->getUsername(), ":p_password"=> $this->getPassword()));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }


}
