<?php include("template/cabecera.php"); ?>
<?php include("administrador/config/bd.php"); ?>
<?php include("api/divisa.php") ?>
<?php include("carro.php"); ?>
<?php $nocliente="";
      $minimoaarticulo=4;
?>

<?php echo $mensaje; ?>
<br>
<h2>Carro de Compras</h2>
<?php if(!empty($_SESSION['CARRO'])){ ?>
<table class="table table-light">
<thead>
    <tr>
      <th width="45%">NOMBRE</th>
      <th width="20%">CANTIDAD</th>
      <th width="20%">PRECIO UNIDAD</th>
      <th width="15%">PRECIO</th>
      
    </tr>
<?php $total=0; ?>
<?php foreach($_SESSION['CARRO'] as $indice=>$producto){?>    
    <tr class="table-success">
      <td width="45%"><?php echo $producto['NOMBRE'] ?></th>
      <td width="20%"><?php echo $producto['CANTIDAD'] ?></td>
      <td width="20%"><?php echo $producto['PRECIO'] ?></td>
      <td width="10%"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD']) ?></td>
      <form action="" method="post">
      
      <td width="5%">
        <input type="hidden" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>" name="id" id="id">
        <button class="btn btn-danger" type="submit" name="btncarro" value="Eliminar"> Eliminar </button>
      </td>

      </form>
    </tr>
<?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
      $totalcliente=$total*0.9; ?>
<?php } ?>
    
    <?php if (($sesionusuario!=$nocliente)&&((count($_SESSION['CARRO'])))>=$minimoaarticulo){ ?>       
    <tr> 
        <td colspan="3" align="right"><h3>TOTAL:</h3></td>
        <td align="right"><h3><?php echo number_format($total,1);?></h3></td>
    </tr>
    <tr> 
        <td colspan="3" align="right"><h3>Descuento:</h3></td>
        <td align="right"><h3><?php echo number_format($total*0.1,1);?></h3></td>
    </tr>



    <tr>
        <td colspan="3" align="right"><h3>TOTAL Cliente:</h3></td>
        <td align="right"><h3><?php echo number_format(($totalcliente),1);?></h3></td>
        <form action="" method="post">
          <input type="hidden" name="preciocliente" id="preciocliente" value="<?php echo openssl_encrypt($totalcliente,COD,KEY); ?>">
          <td colspan="4" align="right">        
            <button class="btn btn-success" type="submit" name="btncarro" value="ComprarCliente">COMPRAR</button>
          </td>
        </form>

    </tr>

    <?php 
        if (!empty($totalcliente)):

            //amount
            $precio = $totalcliente;
            $amount = $precio;

            if (!empty($_GET['to_currency'])):    

                //To Currency
                $to_currency = $_GET['to_currency'];
                $NombreDivisa = NombreDivisa($to_currency,$nusd,$neur,$nmxn,$nars,$npen);
                /* echo $NombreDivisa; */
                $ValorDivisa = ValorDivisa($amount,$to_currency,$usd,$eur,$mxn,$ars,$pen,$nusd,$neur,$nmxn,$nars,$npen);
                /* echo $ValorDivisa; */ ?> 
                
                <tr>
                  <td colspan="3" align="right">
                        <h3>TOTAL CLIENTE EN <?php echo $NombreDivisa ?>:</h3>
                    </td>
                    
                    <td align="right">
                        <h3><?php echo number_format($ValorDivisa,1);?></h3>
                    </td>
                </tr>
                
            <?php else:
            endif;
        else:

        endif;
    ?>

    <?php }else{ ?>
    <tr>
      <td colspan="3" align="right">
          <h3>TOTAL</h3>
      </td>
      <td align="right">
          <h3><?php echo number_format($total,0);?></h3>
          <?php include("webpay/webpay.php"); ?>
      </td>


      <input type="hidden" name="precioinvitado" id="precioinvitado" value="<?php echo openssl_encrypt($total,COD,KEY); ?>">
              <td colspan="4" align="right">    
              <?php if (strlen($url_tbk)) { ?>
                      <form name="brouterForm" id="brouterForm"  method="POST" action="<?=$url_tbk?>" style="display:block;">
                        <input type="hidden" name="token_ws" value="<?=$token?>" />
                        <input type="submit" value="<?=(($submit)? $submit : 'Cargando...')?>" style="border: 1px solid #6b196b;
          border-radius: 4px;
          background-color: #6b196b;
          color: #fff;
          font-family: Roboto,Arial,Helvetica,sans-serif;
          font-size: 1.14rem;
          font-weight: 500;
          margin: auto 0 0;
          padding: 12px;
          position: relative;
          text-align: center;
          -webkit-transition: .2s ease-in-out;
          transition: .2s ease-in-out;
          max-width: 200px;" />
                </form>
                <script>
            
                var auto_refresh = setInterval(
                function()
                {
                    //submitform();
                }, $total);
            //}, 5000);
                function submitform()
                {
                  //alert('test');
                  document.brouterForm.submit();
                }
                </script>
            <?php } ?>  
        </td>
      </form>

      

     
    </tr>
    


    <?php 
        if (!empty($total)):

            //amount
            $precio = $total;
            $amount = $precio;

            if (!empty($_GET['to_currency'])):    

                //To Currency
                $to_currency = $_GET['to_currency'];
                $NombreDivisa = NombreDivisa($to_currency,$nusd,$neur,$nmxn,$nars,$npen);
                /* echo $NombreDivisa; */
                $ValorDivisa = ValorDivisa($amount,$to_currency,$usd,$eur,$mxn,$ars,$pen,$nusd,$neur,$nmxn,$nars,$npen);
                /* echo $ValorDivisa; */ ?> 
                
                <tr>
                  <td colspan="3" align="right">
                        <h3><?php echo $NombreDivisa ?></h3>
                    </td>
                    
                    <td align="right">
                        <h3><?php echo number_format($ValorDivisa,1);?></h3>
                    </td>
                </tr>
                
            <?php else:
            endif;
        else:

        endif;
    ?>
      
 

    <?php } ?>
  </thead>

</table>
<?php }else{ ?>
<div class="alert alert-success">NO HAY PRODUCTOS EN EL CARRO</div>
<?php } ?>

<?php include("template/pie.php"); ?>