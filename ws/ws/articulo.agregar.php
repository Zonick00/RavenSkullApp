<?php

require_once '../logica/Articulo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';

    move_uploaded_file($_FILES["image"]["tmp_name"], '../image/'.basename($_FILES["image"]["name"]));