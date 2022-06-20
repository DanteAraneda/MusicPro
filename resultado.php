<?php include("template/cabecera.php"); ?>
<?php include("administrador/config/bd.php"); ?>
<?php include("api/divisa.php") ?>
<?php include("webpay/webpay.php") ?>


<h1>Compra realizada correctamente</h1>

<?php 

    echo $message; 
    
?>

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