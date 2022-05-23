<?php include("template/cabecera.php"); ?>
<?php include("api/divisa.php"); ?>
<?php include("administrador/config/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT * FROM producto");
$sentenciaSQL->execute();
//recupera los registros en $listaproducto para mostrar todos (metodo Fetch_assoc)
$listaproducto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>
<?php include("carro.php"); ?>

<h1>instrumentos</h1>
 <?php if($mensaje!=""){ ?>
<div class="alert alert-dismissible alert-primary">
<?php //echo $mensaje;
echo "Se ha agregado al carro."; ?>
</div>
<?php } ;?>
<?php foreach($listaproducto as $producto){ ?>
<div class="col-md-2">
<br/>
    <div class="card">
    
        <img class="card-img-top" src="img/<?php echo $producto['imagen']; ?>" alt="">

        <div class="card-body">
            <h4 class="card-title"> <?php echo $producto['nombre_prod']; ?> </h4>
            <p class="card-text"> <?php echo $producto['descripcion']; ?>  </p> CLP $<?php echo $producto['precio']; ?> 
            <br>

            <?php 
                if (!empty($producto['precio'])):
                    
                    //amount
                    $precio = $producto['precio'];
                    $amount = $precio;

                    if (!empty($_GET['to_currency'])):    

                        //To Currency
                        $to_currency = $_GET['to_currency'];
                        $CalculoDivisa = CalculoDivisa($amount,$to_currency,$usd,$eur,$mxn,$ars,$pen,$nusd,$neur,$nmxn,$nars,$npen);
                        echo $CalculoDivisa;                    
                        
                    else:
                        echo "Seleccione divisa";
                    endif;
                else:
                    echo "Precio invalido";
                endif;
            ?>



            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_producto'],COD,KEY); ?>">
                <input type="hidden" name="nombre_prod" id="" value="<?php echo openssl_encrypt($producto['nombre_prod'],COD,KEY); ?>">
                <input type="hidden" name="precio" id="" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                <button class="badge rounded-pill bg-success" name="btncarro" value="Agregar" type="submit"> Agregar al carro </button>
            </form>
        </div>
    
    </div>
</div>
<?php } ?>


<?php include("template/pie.php"); ?>