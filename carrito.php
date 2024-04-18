<?php

$mensaje="";
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case'Agregar':
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.= "OK ID correcto"."<br/>".$ID;

            }else{
                $mensaje.= "UPSS... ID incorrecto"."<br/>".$ID;
            }

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="OK nombre".$NOMBRE."<br/>"
            }else{$mensaje.="Upss.. algo pasa con el nombre"."<br/>"; break;}

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="OK cantidad".$CANTIDAD."<br/>";
            }else{ $mensaje.="Upss.. algo pasa con la cantidad"."<br/>"; break;}

            if(is_numeric((openssl_decrypt($_POST['precio'],COD,KEY)))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="OK precio".$PRECIO."<br/>";
            }else{ $mensaje.="uppss.. algo pasa con el precio"."<br/>";break}

            break;
    }
}
?>