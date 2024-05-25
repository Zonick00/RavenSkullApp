<?php

require_once '../logica/Articulo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

/*if (! isset($_FILE["image"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

$image = $_FILE["image"];
$folder = '../image/'.$image.'.jpg';

Funciones::cargarArchivo($image, $folder);
 */

 $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

    $folder = "image/".$filename;
    
    move_uploaded_file($tempname, $folder);