<?php

require_once '../datos/Conexion.clase.php';

class Pedido extends Conexion{
    
    public function ListarPedido() {
        try {
            $sql = "select id_pedido, precio_total, id_personalizacion from pedido where estado='R' order by 1 desc;";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function DetalleCatalogo($idPedido) {
        try {
            $sql = "select * from detalle_catalogo where id_pedido = :p_idPedido;";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_idPedido"=> $idPedido));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function DetallePersonalizacion($idPersonalizacion) {
        try {
            $sql = "select * from personalizacion where id_personalizacion = :p_idPersonalizacion;";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_idPersonalizacion"=> $idPersonalizacion));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function CambiarEstadoFinalizado($id_pedido) {
        try {
            $sql = "UPDATE public.pedido SET estado='F' WHERE id_pedido=:p_id_pedido;";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_id_pedido"=> $id_pedido));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
