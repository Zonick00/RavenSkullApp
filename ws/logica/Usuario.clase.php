<?php

require_once '../datos/Conexion.clase.php';

class Usuario extends Conexion{
    
    public function registrarUsuario($p_name, $p_lastname, $p_dni, $p_address, $p_phone, $p_username, $p_password) {
        try {
            $sql = "INSERT INTO public.users(user_name, user_lastname, user_dni, user_address, user_phone, user_username, user_password)
                    VALUES (:p_name, :p_lastname, :p_dni, :p_address, :p_phone, :p_username, :p_password);";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_lastname"=> $p_lastname, 
                                      ":p_dni"=> $p_dni,
                                      ":p_address"=> $p_address,
                                      ":p_phone"=> $p_phone,
                                      ":p_username"=> $p_username,
                                      ":p_password"=> $p_password));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
