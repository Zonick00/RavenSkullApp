<?php

require_once '../logica/Articulo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

if (! isset($_POST["image"])){
    Funciones::imprimeJSON("Falta completar los datos requeridos");
    exit();
}

$image = $_POST["image"];
$folder = '../image/'.$image;

Funciones::cargarArchivo($image, $folder);