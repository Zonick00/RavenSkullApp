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
   
}
