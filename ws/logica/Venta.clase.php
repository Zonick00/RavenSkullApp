<?php
require_once '../datos/Conexion.clase.php';

class Venta extends Conexion{
    
    public function listarVentas() {
        try {
            $sql = "SELECT 
                        o.order_id, 
                        o.order_date, 
                        o.deliver_date, 
                        o.shipping, 
                        o.shipping_cost, 
                        o.order_address, 
                        o.net_price, 
                        o.discount, 
                        o.total_price, 
                        o.order_state, 
                        o.customer_id, 
                        o.user_id,
                        u.user_name ||' '|| u.user_lastname as userFullname,
                        cu.customer_name ||' '|| cu.customer_lastname as customerFullname
                    FROM orders o
                    INNER JOIN users u ON o.user_id = u.userid
                    INNER JOIN customers cu ON o.customer_id = cu.customer_id
                    ORDER BY 2 DESC";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarVentasPorUsuario($p_userId) {
        try {
            $sql = "SELECT 
                        o.order_id, 
                        o.order_date, 
                        o.deliver_date, 
                        o.shipping, 
                        o.shipping_cost, 
                        o.order_address, 
                        o.net_price, 
                        o.discount, 
                        o.total_price, 
                        o.order_state, 
                        o.customer_id, 
                        o.user_id,
                        u.user_name ||' '|| u.user_lastname as userFullname,
                        cu.customer_name ||' '|| cu.customer_lastname as customerFullname
                    FROM orders o
                    INNER JOIN users u ON o.user_id = u.userid
                    INNER JOIN customers cu ON o.customer_id = cu.customer_id
                    WHERE o.user_id = :p_userId
                    ORDER BY 2 DESC";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_userId"=> $p_userId));
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
    
    public function registrarVenta($p_datetime, $p_shipping, $p_shipping_cost, $p_order_address, $p_discount, $p_customerId, $p_userId, $det_ped) {
        try {
            $sql = "SELECT f_registrar_pedido(
                    :p_datetime, 
                    :p_shipping, 
                    :p_shipping_cost, 
                    :p_order_address, 
                    :p_discount, 
                    :p_customerId, 
                    :p_userId, 
                    :det_ped)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_datetime"=> $p_datetime,
                                      ":p_shipping"=> $p_shipping,
                                      ":p_shipping_cost"=> $p_shipping_cost,
                                      ":p_order_address"=> $p_order_address,
                                      ":p_discount"=> $p_discount,
                                      ":p_customerId"=> $p_customerId,
                                      ":p_userId"=> $p_userId,
                                      ":det_ped"=> $det_ped));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function ListarEntreFechas($p_fecha1, $p_fecha2) {
        try {
            $sql = "select * from orders where order_date between :p_fecha1 and :p_fecha2 order by 1 desc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_fecha1"=> $p_fecha1,
                                      ":p_fecha2"=> $p_fecha2));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
