<?php

require_once '../datos/Conexion.clase.php';

class Insumo extends Conexion{
    
    public function registrarInsumo($p_name, $p_stock, $p_priceBuy, $p_addressBuy, $p_phoneBuy) {
        
        try {
            $sql = "INSERT INTO public.supplies(supplies_name, supplies_stock, supplies_priceBuy, supplies_addressBuy, supplies_phoneBuy)
                    VALUES (:p_name, :p_stock, :p_priceBuy, :p_addressBuy, :p_phoneBuy);";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_stock"=> $p_stock, 
                                      ":p_priceBuy"=> $p_priceBuy,
                                      ":p_addressBuy"=> $p_addressBuy,
                                      ":p_phoneBuy"=> $p_phoneBuy));
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
    
    public function actualizarInsumo($p_name, $p_stock, $p_priceBuy, $p_addressBuy, $p_phoneBuy, $p_suppliesId) {
        try{
            $sql = "UPDATE public.supplies
                    SET 
                        supplies_name=:p_name, 
                        supplies_stock=:p_stock, 
                        supplies_priceBuy=:p_priceBuy, 
                        supplies_addressBuy=:p_addressBuy, 
                        supplies_phoneBuy=:p_phoneBuy
                    WHERE supplies_id=:p_suppliesId;";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_suppliesId"=> $p_suppliesId, 
                                      ":p_name"=> $p_name, 
                                      ":p_stock"=> $p_stock, 
                                      ":p_priceBuy"=> $p_priceBuy,
                                      ":p_addressBuy"=> $p_addressBuy,
                                      ":p_phoneBuy"=> $p_phoneBuy));
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
