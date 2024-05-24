<?php

require_once '../datos/Conexion.clase.php';

class Personalizacion extends Conexion{
    
    public function registrarPersonalizacion($id_usuario, $p_forma, $p_piso, $p_relleno, $p_sabor, $p_dimension, $p_colorcake, $p_colorborde, $p_borde, $p_imagen, $p_objeto, $p_cantidad, $p_precio, $p_id_pedido) {
        try {
            $sql = "select * from f_registrar_pedido_pers(:p_id_usuario, :p_forma, :p_piso, :p_relleno, :p_sabor, :p_dimension, :p_colorcake, :p_colorborde, :p_borde, :p_imagen, :p_objeto, :p_cantidad, :p_precio, :p_id_pedido)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_id_usuario"=> $id_usuario, 
                                      ":p_forma"=> $p_forma, 
                                      ":p_piso"=> $p_piso,
                                      ":p_relleno"=> $p_relleno,
                                      ":p_sabor"=> $p_sabor,
                                      ":p_dimension"=> $p_dimension,
                                      ":p_colorcake"=> $p_colorcake,
                                      ":p_colorborde"=> $p_colorborde,
                                      ":p_borde"=> $p_borde,
                                      ":p_imagen"=> $p_imagen,
                                      ":p_objeto"=> $p_objeto,
                                      ":p_cantidad"=> $p_cantidad,
                                      ":p_precio"=> $p_precio,
                                      ":p_id_pedido"=> $p_id_pedido));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
