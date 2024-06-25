<?php
require_once '../datos/Conexion.clase.php';

class Venta extends Conexion{
    
    public function listarVentas() {
        try {
            $sql = "select * from orders order by 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarVenta($p_ordeId) {
        try {
            $sql = "select * from orders where order_id = :p_orderId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_orderId"=> $p_ordeId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarDetalleVenta($p_ordeId) {
        try {
            $sql = "SELECT * FROM order_detail WHERE order_id = :p_orderId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_orderId"=> $p_ordeId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function cambiarEstadoVenta($p_state, $p_orderId) {
        try {
            $sql = "UPDATE orders SET order_state = :p_state WHERE order_id = :p_orderId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_state"=> $p_state,
                                      ":p_orderId"=> $p_orderId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
