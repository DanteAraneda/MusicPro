<?php 
session_start();
include("config/bd.php");
$usuariologin="";
$usuarioid="";
$rut="";
if ($_POST){
/*  En vez de seleccionar la tabla producto, seleccionariamos la tabla usuario
      $sentenciaSQL=$conexion->prepare("SELECT * FROM producto WHERE id_producto=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $instrumento=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
      $txtCategoria=$instrumento['categoria'];

    Esta linea hay que cambiar cuando consultamos por un usuario dentro de la bdd
    realizariamos una consulta como en los metodos del crud y validariamos segun los resultados
    si el dato que se ingreso pertenece a la tabla usuario con su contrasenia correspondiente
*/    
        $sentenciaSQL=$conexion->prepare("SELECT * FROM usuario WHERE nombre_p=:nombre_p");
        $sentenciaSQL->bindParam(':nombre_p',$_POST['usuario']);
        $sentenciaSQL->execute();
        $usuariobd=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $usuariologin=$usuariobd['nombre_p'];
        $usuarioid=$usuariobd['tipo_usuario_id_tipo_usuario'];
        $rut=$usuariobd['rut'];


        	
        



        if(($_POST['usuario']== $usuariologin)&&($_POST['contrasenia']==$rut)&&($usuarioid=="1")){



    //se le da valor ok que le pusimos como condicion en head.php
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']=$usuariologin;
        header('Location:inicio.php');}else{
            $mensaje="Error: El usuario o contrasenia es incorrecto";
        }
}

?>
<!doctype html>
    <html lang="es">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
    
<div class="container">
        <div class="row">
        <div class="col-md-4">
            
        </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">

                <?php if(isset($mensaje)){ ?>

                <div class="alert alert-danger" role="alert">
                    <?php  echo $mensaje; ?>
                </div>

                <?php } ?>
                   <form method="POST" >
                   <div class = "form-group">
                   <label>Email address</label>
                   <input type="text" class="form-control" name="usuario"  placeholder="Enter user">
                    </div>

                   <div class="form-group">
                   <label >Password</label>
                   <input type="password" class="form-control" name="contrasenia" placeholder="Password">
                   </div>
                   
                   <button type="submit" class="btn btn-primary">Entrar</button>
                   </form>
                   <a href="../index.php">SitioWeb</a>
                   
                   
                </div>
                
            </div>
                
            </div>
            
        </div>
    </div>
    <div>
    <div>
<?php include("template/foot.php"); ?>