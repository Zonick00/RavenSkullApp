<?php

require_once '../logica/Articulo.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once './token.validar.php';
chmod('/ws/articulo.agregar.php', 0777);
//move_uploaded_file($_FILES["image"]["tmp_name"],Funciones::$DIRECCION_WEB_SERVICE.'image/'.basename($_FILES["image"]["name"]));

$archivo = $_FILES['archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
       echo 'se subio correctamente';
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
         echo "<pre>";
         print_r($_FILES['archivo']);
         echo "</pre>";
         $ruta=$_SERVER['DOCUMENT_ROOT'].'/images/'.$archivo;
         
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, $ruta)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('/image/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="app/images/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
           
           echo '<p><img src="/image/WhatsApp Image 2024-05-11 at 1.27.14 PM.jpeg"></p>';
        }
      }
   }
