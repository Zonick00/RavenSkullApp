<?php

require_once '../datos/Conexion.clase.php';

class Usuario extends Conexion{
    
    public function registrarUsuario($p_email, $p_clave, $p_nombres, $p_apellidos, $p_direccion, $p_telefono, $p_fecha_nac, $p_sexo) {
        try {
            $sql = "select * from f_registrar_usuario(:p_email, md5(:p_clave), :p_nombres, :p_apellidos, :p_direccion, :p_telefono, :p_fecha_nac, :p_sexo)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_email"=> $p_email, 
                                      ":p_clave"=> $p_clave, 
                                      ":p_nombres"=> $p_nombres,
                                      ":p_apellidos"=> $p_apellidos,
                                      ":p_direccion"=> $p_direccion,
                                      ":p_telefono"=> $p_telefono,
                                      ":p_fecha_nac"=> $p_fecha_nac,
                                      ":p_sexo"=> $p_sexo));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
