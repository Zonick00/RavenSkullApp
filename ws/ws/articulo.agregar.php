<?php

require_once '../logica/Articulo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

$name = $_POST['name'];
$image = $_POST['image'];
    
    $decodeImage = base64_decode($image); 
    file_put_contents('../fotos/'.$name.'.jpg' , $decodeImage);