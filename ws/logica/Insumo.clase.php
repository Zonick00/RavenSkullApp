<?php

require_once '../datos/Conexion.clase.php';

class Insumo extends Conexion{
    
    public function registrarInsumo($p_name, $p_stock, $p_price, $p_address, $p_phone) {
        
        try {
            $sql = "INSERT INTO public.supplies(supplies_name, supplies_stock, supplies_price, supplies_address, supplies_phone)
                    VALUES (:p_name, :p_stock, :p_priceBuy, :p_addressBuy, :p_phoneBuy);";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_stock"=> $p_stock, 
                                      ":p_price"=> $p_price,
                                      ":p_address"=> $p_address,
                                      ":p_phone"=> $p_phone));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarInsumos() {
        try {
            $sql = "select * from public.supplies order by 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarInsumos($p_suppliesId) {
        try {
            $sql = "select * from public.supplies where supplies_id= :p_suppliesId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_suppliesId"=> $p_suppliesId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function actualizarInsumo($p_name, $p_stock, $p_price, $p_address, $p_phone, $p_suppliesId) {
        try{
            $sql = "UPDATE public.supplies
                    SET 
                        supplies_name=:p_name, 
                        supplies_stock=:p_stock, 
                        supplies_price=:p_price, 
                        supplies_address=:p_address, 
                        supplies_phone=:p_phone
                    WHERE supplies_id=:p_suppliesId;";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_suppliesId"=> $p_suppliesId, 
                                      ":p_name"=> $p_name, 
                                      ":p_stock"=> $p_stock, 
                                      ":p_price"=> $p_price,
                                      ":p_address"=> $p_address,
                                      ":p_phone"=> $p_phone));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function actualizarStock($p_suppliesId, $p_stock) {
        try{
            $sql = "UPDATE public.supplies
                    SET supplies_stock=supplies_stock+:p_stock
                    WHERE supplies_id=:p_suppliesId";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_stock"=> $p_stock,
                                      ":p_suppliesId"=> $p_suppliesId));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
