<?php

require_once '../datos/Conexion.clase.php';

class Categoria extends Conexion{
    
     public function registrarCategoria($p_name) {
        
        try {
            $sql = "INSERT INTO public.categories(category_name)
                    VALUES (:p_name);";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarCategoria() {
        try {
            $sql = "select * from public.categories order by 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarCategoria($p_categoryId) {
        try {
            $sql = "select * from public.categories where category_id= :p_categoryId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_categoryId"=> $p_categoryId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
     public function actualizarCategoria($p_name, $p_categoryId) {
        try{
            $sql = "UPDATE public.categories
                    SET 
                        category_name=:p_name, 
                    WHERE category_id=:p_categoryId;";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_categoryId"=> $p_categoryId, 
                                      ":p_name"=> $p_name));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
