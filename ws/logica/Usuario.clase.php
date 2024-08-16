<?php

require_once '../datos/Conexion.clase.php';

class Usuario extends Conexion{
    
    public function registrarUsuario($p_name, $p_lastname, $p_dni, $p_address, $p_phone, $p_username, $p_password, $p_type) {
        try {
            $sql = "INSERT INTO public.users(user_name, user_lastname, user_dni, user_address, user_phone, user_username, user_password, user_type)
                    VALUES (:p_name, :p_lastname, :p_dni, :p_address, :p_phone, :p_username, md5(:p_password), :p_type);";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_lastname"=> $p_lastname, 
                                      ":p_dni"=> $p_dni,
                                      ":p_address"=> $p_address,
                                      ":p_phone"=> $p_phone,
                                      ":p_username"=> $p_username,
                                      ":p_password"=> $p_password,
                                      ":p_type"=> $p_type));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarUsuarios() {
        try {
            $sql = "SELECT * FROM public.users ORDER BY userid ASC ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarUsuario($p_userId) {
        try {
            $sql = "SELECT * FROM public.users WHERE userid = :p_userId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_userId"=> $p_userId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function cambiarEstadoUsuario($p_state, $p_userId) {
        try {
            $sql = "UPDATE public.users
                        SET user_state = :p_state
                        WHERE userid = :p_userId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_state"=> $p_state, 
                                      ":p_userId"=> $p_userId));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function cambiarPasswordUsuario($p_password, $p_userId) {
        try {
            $sql = "UPDATE public.users
                        SET user_password = :p_password
                        WHERE userid= :p_userId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_password"=> $p_password, 
                                      ":p_userId"=> $p_userId));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
        public function actualizarUsuario($p_userId, $p_name, $p_lastname, $p_dni, $p_address, $p_phone, $p_username) {
        try{
            $sql = "UPDATE public.users
                    SET user_name = :p_name, 
                        user_lastname = :p_lastname, 
                        user_dni = :p_dni, 
                        user_address = :p_address, 
                        user_phone = :p_phone, 
                        user_username = :p_username
                    WHERE userid = :p_userId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_userId"=> $p_userId, 
                                      ":p_name"=> $p_name, 
                                      ":p_lastname"=> $p_lastname, 
                                      ":p_dni"=> $p_dni,
                                      ":p_address"=> $p_address,
                                      ":p_phone"=> $p_phone,
                                      ":p_username"=> $p_username));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
