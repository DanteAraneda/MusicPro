<?php 
$mensaje="";

if(isset($_POST['btncarro'])){
    switch ($_POST['btncarro']) {
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $IDentificador= openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje="Ok ID Correcto ".$IDentificador;
            }else{
                $mensaje="Rayos y centellas ID incorrecto".$IDentificador;
            }

            if(is_string(openssl_decrypt($_POST['nombre_prod'],COD,KEY))){
                $NOMBRE= openssl_decrypt($_POST['nombre_prod'],COD,KEY);
                $mensaje="Ok nombre Correcto ".$NOMBRE;
            }else{
                $mensaje="Rayos y centellas nombre incorrecto".$NOMBRE;
            }
            
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO= openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje="Ok precio Correcto ".$PRECIO;
            }else{
                $mensaje="Rayos y centellas precio incorrecto".$PRECIO;
            }
                        
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $cantidad= openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje="Ok cantidad Correcto ".$cantidad;
            }else{
                $mensaje="Rayos y centellas cantidad incorrecto".$cantidad;
            }

            if(!isset($_SESSION['CARRO'])){
                $instru=array(
                    'ID'=>$IDentificador,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$cantidad,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRO'][0]=$instru;
            }else{
                $numeroinstru=count($_SESSION['CARRO']);
                $instru=array(
                    'ID'=>$IDentificador,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$cantidad,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRO'][$numeroinstru]=$instru;
            }
            $mensaje=print_r($_SESSION, true);
            break;

        case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $IDentificador= openssl_decrypt($_POST['id'],COD,KEY);
                
                foreach($_SESSION['CARRO'] as $indice=>$producto){
                    if($producto['ID']==$IDentificador){
                        unset($_SESSION['CARRO'][$indice]);
                    }
                }
            }else{
                $mensaje="Rayos y centellas ID incorrecto".$IDentificador;
            }
            break;
        
        case 'Comprar':
            if(is_numeric(openssl_decrypt($_POST['precioinvitado'],COD,KEY))){
                $PRECIOTOTAL= openssl_decrypt($_POST['precioinvitado'],COD,KEY);
                $mensaje="Ok precio Correcto ".$PRECIOTOTAL;
            }else{
                $mensaje="Rayos y centellas precio incorrecto".$PRECIOTOTAL;
            }

            break;

        case 'ComprarCliente':
            if(is_numeric(openssl_decrypt($_POST['preciocliente'],COD,KEY))){
                $PRECIOTOTAL= openssl_decrypt($_POST['preciocliente'],COD,KEY);
                $mensaje="Ok precio Correcto ".$PRECIOTOTAL;
            }else{
                $mensaje="Rayos y centellas precio incorrecto".$PRECIOTOTAL;
            }
            
            break;

    }
}

?>