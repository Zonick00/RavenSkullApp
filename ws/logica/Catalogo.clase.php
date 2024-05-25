<?php

require_once '../datos/Conexion.clase.php';
$permissions = 'drwxr-xr-x';  // or whatever

class Catalogo extends Conexion{
    
    private $id_usuario;
    private $detalle_catalogo;
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getDetalle_catalogo() {
        return $this->detalle_catalogo;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setDetalle_catalogo($detalle_catalogo) {
        $this->detalle_catalogo = $detalle_catalogo;
    }

    public function BuscarItem($p_id_catalogo) {
        try {
            $sql = "select * from catalogo where id_catalogo = :p_id_catalogo;";
            $sentencia = $this->dblink->prepare($sql);
             $sentencia->execute(array(":p_id_catalogo"=> $p_id_catalogo));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }    
    
    public function ObtenerItem() {
        try {
            $sql = "select * from catalogo order by 1;";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function obtenerFoto($p_id_item) {
        $foto = "../foto-catalogo/".$p_id_item;

        if (file_exists( $foto . ".png" )){
            $foto = "/foto-catalogo/".$p_id_item.".png";

        }else if (file_exists( $foto . ".PNG" )){
            $foto = "/foto-catalogo/".$p_id_item.".PNG";

        }else if (file_exists( $foto . ".jpg" )){
            $foto = "/foto-catalogo/".$p_id_item.".jpg";

        }else if (file_exists( $foto . ".JPG" )){
            $foto = "/foto-catalogo/".$p_id_item.".JPG";

        }else{
            $foto = "none";
        }

        if ($foto == "none"){
            return $foto;
        }else{
            return Funciones::$DIRECCION_WEB_SERVICE . $foto;
        }

    }
    
    public function Agregar() {
        try {
            $sql = "select * from f_registrar_pedido(:p_id_usuario,:p_detalle_catalogo)";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute(array(":p_id_usuario"=> $this->getId_usuario(), 
                                      ":p_detalle_catalogo"=> $this->getDetalle_catalogo()));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
            /*
            $sentencia = $this->dblink->prepare($sql);
            
            $sentencia->bindParam(":p_id_usuario", $this->getId_usuario());
            $sentencia->bindParam(":p_detalle_catalogo", $this->getDetalle_catalogo());
            
            $sentencia->execute();
            
            return true;*/
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
