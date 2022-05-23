<?php 
session_start();
include("administrador/config/bd.php");
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


        	
        



        if(($_POST['usuario']== $usuariologin)&&($_POST['contrasenia']==$rut)&&($usuarioid=="4")){



    //se le da valor ok que le pusimos como condicion en head.php
        $_SESSION['usuario']="cliente";
        $_SESSION['nombreUsuario']=$usuariologin;
        header('Location:index.php');}else{
            $mensaje="Error: El usuario o contrasenia es incorrecto";
        }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">


    <a class="navbar-brand" href="login.php">MUSIC PRO</a>



    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="instrumentos.php">Productos</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="nosotros.php">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listacarro.php">Carro</a>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Buscar">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>



    <div class="container">
    <br/>
        <div class="row">
      <br/>
 
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
                   <label>Nombre de Usuario</label>
                   <input type="text" class="form-control" name="usuario"  placeholder="MusicPro">
                    </div>

                   <div class="form-group">
                   <label >Contraseña</label>
                   <input type="password" class="form-control" name="contrasenia" placeholder="********">
                   </div>
                   
                   <a href="recuperarcuenta.php" class="card-link">¿Olvidaste tu cuenta o contraseña?</a>
                   <div>
                    <br/>
                   <button type="submit" class="btn btn-outline-primary">Entrar</button>
                   
                   <a type="button" href="crearcuenta.php" class="btn btn-outline-info">Crear Cuenta</a>
                   
                   </div>

                   </form>
                   
                   
                </div>
                
            </div>
                
            </div>
            
        </div>
    </div>
    <div>
    <div>

<?php include("template/pie.php");  ?>