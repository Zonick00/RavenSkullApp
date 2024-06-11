<?php

require_once '../datos/Conexion.clase.php';

class Producto extends Conexion{
    
    public function registrarProducto($p_name, $p_price, $p_wholesale, $p_sold, $p_stock, $p_image, $p_category) {
        
        try {
            $sql = "INSERT INTO public.products
                    (product_name, product_price, product_wholesale, product_sold, product_stock, product_image, category_id)
                    VALUES (:p_name, :p_price, :p_wholesale, :p_sold, :p_stock, :p_image, :p_category)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_price"=> $p_price, 
                                      ":p_wholesale"=> $p_wholesale,
                                      ":p_sold"=> $p_sold,
                                      ":p_stock"=> $p_stock,
                                      ":p_image"=> $p_image,
                                      ":p_category"=> $p_category));
            return $sentencia->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarProductos() {
        try {
            $sql = "select * from products order by 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function buscarProducto($p_productoId) {
        try {
            $sql = "select * from products where product_id= :p_productoId";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_productoId"=> $p_productoId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function actualizarProducto($p_productoId, $p_name, $p_price, $p_wholesale, $p_sold, $p_stock, $p_image, $p_category) {
        try{
            $sql = "UPDATE public.products
                    SET product_name=:p_name, 
                        product_price=:p_price, 
                        product_wholesale=:p_wholesale, 
                        product_sold=:p_sold, 
                        product_stock=:p_stock, 
                        product_image=:p_image, 
                        category_id=:p_category
                    WHERE product_id = :p_productoId";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_name"=> $p_name, 
                                      ":p_price"=> $p_price, 
                                      ":p_wholesale"=> $p_wholesale,
                                      ":p_sold"=> $p_sold,
                                      ":p_stock"=> $p_stock,
                                      ":p_image"=> $p_image,
                                      ":p_category"=> $p_category,
                                      ":p_productoId"=> $p_productoId));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function actualizarStock($p_productoId, $p_stock) {
        try{
            $sql = "UPDATE public.products
                    SET product_stock=product_stock+:p_stock
                    WHERE product_id=:p_productoId";
                    
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_stock"=> $p_stock,
                                      ":p_productoId"=> $p_productoId));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
   
}
