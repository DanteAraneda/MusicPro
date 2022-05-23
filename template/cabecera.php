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
    <link rel="stylesheet" href="./css/header.css" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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

        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                API $
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

              <form class="" action="" method="get">
                    <select style="visibility:hidden" name="to_currency">
                        <option value="USD"></option>
                    </select>
                    <button class="boton_d" id="b_usd" type="submit" name="button" style="filter:alpha(opacity=0);">USD</button>
              </form>

              <form class="" action="" method="get">
                    <select style="visibility:hidden" name="to_currency">
                        <option value="EUR"></option>
                    </select>
                    <button class="boton_d" id="b_eur" type="submit" name="button">EUR</button>
              </form>

              <form class="" action="" method="get">
                    <select style="visibility:hidden" name="to_currency">
                        <option value="MXN"></option>
                    </select>
                    <button class="boton_d" id="b_mxn" type="submit" name="button">MXN</button>
              </form>

              <form class="" action="" method="get">
                    <select style="visibility:hidden" name="to_currency">
                        <option value="ARS"></option>
                    </select>
                    <button class="boton_d" id="b_arg" type="submit" name="button">ARG</button>
              </form>

              <form class="" action="" method="get">
                    <select style="visibility:hidden" name="to_currency">
                        <option value="PEN"></option>
                    </select>
                    <button class="boton_d" id="b_pen" type="submit" name="button">PEN</button>
              </form>


              </ul>
            </li>
          </ul>

        </div>

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



