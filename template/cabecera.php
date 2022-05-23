<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  $sesionusuario="";
}else{
  $sesionusuario=$_SESSION['usuario'];
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">

<?php if($sesionusuario!="cliente"){ ?>

    <a class="navbar-brand" href="cerrarsesion.php">MUSIC PRO</a>

<?php }else{ ?>

  <a class="navbar-brand" href="cerrarsesion.php">Cerrar</a>

<?php } ?>

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
          <a class="nav-link" href="listacarro.php">Carro (<?php echo (empty($_SESSION['CARRO']))?0:count($_SESSION['CARRO']); ?>)</a>
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



