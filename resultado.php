<?php include("template/cabecera.php"); ?>
<?php include("administrador/config/bd.php"); ?>
<?php include("api/divisa.php") ?>
<?php include("webpay/webpay.php") ?>

<?php /*

    echo $response->amount;
    echo $response->status;
    echo $response->buy_order;
    $hola="_ Hola _ ";
    $comprabien=$response->response_code;
    echo $hola;
    echo $response->response_code;
*/
$comprabien=$response->response_code;?>

<?php if ($comprabien==0){ ?>
    <div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Compra realizada correctamente</strong> 
</div>
<div class="card text-white bg-primary mb-3" style="max-width: 80rem;">
            <div class="card-header"></div>
                <div class="card-body">
                    <h4 class="card-title">DETALLE DE COMPRA</h4>
                    </br>
                    <p class="card-text">NUMERO DE TRANSACCIÓN: <?php echo $response->session_id; ?></p>
                    <p class="card-text">FECHA: <?php echo $response->transaction_date; ?></p>
                    <p class="card-text">ESTADO: APROBADO</p>
                    <p class="card-text">ORDEN DE COMPRA: <?php echo $response->buy_order; ?></p>
                    <p class="card-text">MONTO TOTAL: <?php echo $response->amount; ?> </p>
                </div>
        </div>
        




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
    <?php }else { ?>

        
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Ups!</strong>  Algo paso con tu compra y no se pudo realizar...
        </div>
        <div class="card text-white bg-primary mb-3" style="max-width: 80rem;">
            <div class="card-header"></div>
                <div class="card-body">
                    <h4 class="card-title">DETALLE DE COMPRA</h4>
                    </br>
                    <p class="card-text">NUMERO DE TRANSACCIÓN: <?php echo $response->session_id; ?></p>
                    <p class="card-text">FECHA: <?php echo $response->transaction_date; ?></p>
                    <p class="card-text">ESTADO: RECHAZADO</p>
                    <p class="card-text">ORDEN DE COMPRA: <?php echo $response->buy_order; ?></p>
                    <p class="card-text">MONTO TOTAL: <?php echo $response->amount; ?> </p>
                </div>
        </div>
        
        <?php } ?>   