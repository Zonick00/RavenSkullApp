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
}
