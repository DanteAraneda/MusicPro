<?php

/*     function currencyConverter($from, $to, $amount) {
        $amount    = urlencode($amount);
        $from    = urlencode($from);
        $to        = urlencode($to);
        $url    = "https://api.apilayer.com/exchangerates_data/convert?to=$to&from=$from&amount=$amount";
        $ch     = @curl_init();
        $timeout= 0;
        
        curl_setopt_array($ch, array( CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=".$to ."&from=".$from ."&amount=".$amount ."",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: TilQayMCJYXqYuOu9Z552UEbaIxpKTUO"
            )));
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        
        $response = curl_exec($ch);
        if (curl_errno($ch)) echo curl_error($ch);
        else $decoded = json_decode($response, true);
        //var_dump($decoded);
        $resultado = $decoded["result"];
        //return $resultado;
        echo "USD:  $$resultado";

        curl_close($ch);
        

        
    } */

?>


<?php

/*     function currencyConverter($from, $to, $amount) {
        $amount  = urlencode($amount);
        $from    = urlencode($from);
        $to      = urlencode($to);
        $timeout = 0;
        
        $content = file_get_contents("https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/$to/$from.json");

        $result  = json_decode($content);
        
        $valor = $result->clp;
        $fecha = $result->date;
        $monto = round( $amount / $valor,2);

        //$resultado = $decoded["result"];
        $to = strtoupper($to);
        echo "$to:  $$monto";

        
    } */

?>

<?php 

/* function currencyConverter($from, $to, $amount) {
    $amount    = urlencode($amount);
    $from    = urlencode($from);
    $to        = urlencode($to);
    $timeout= 0; 
    
    $json = file_get_contents('http://www.floatrates.com/daily/clp.json');

    //$amount = 15000;

    $array = json_decode($json);
    $urlPoster=array();
    foreach ($array as $value) {
        $urlPoster[$value->code]=$value;
                    }
    if (!empty($amount)):                
        if ($to == "USD"):
            $usd = $urlPoster['USD']->rate;
            $nombre = $urlPoster['USD']->name;
            $valor = round($amount * $usd,2);
            echo "$nombre:  $$valor";

        elseif ($to == "EUR"):
            $eur = $urlPoster['EUR']->rate;
            $nombre = $urlPoster['EUR']->name;
            $valor = round($amount * $eur,2);
            echo "$nombre:  $$valor";
        
        elseif ($to == "MXN"): 
            $mxn = $urlPoster['MXN']->rate;
            $valor = round($amount * $mxn,2);
            $nombre = $urlPoster['MXN']->name;
            echo "$nombre:  $$valor";

        elseif ($to == "ARS"): 
            $arg = $urlPoster['ARS']->rate;
            $nombre = $urlPoster['ARS']->name;
            $valor = round($amount * $arg,2);
            echo "$nombre:  $$valor";
        
        elseif ($to == "PEN"):
            $pen = $urlPoster['PEN']->rate;
            $nombre = $urlPoster['PEN']->name;
            $valor = round($amount * $pen,2);
            echo "$nombre:  $$valor";

        else:
            echo "Ingrese moneda destino valido";
        endif;
    else:
        echo "Ingrese monto >:C";
    endif;
    
} 
 */
?>


<?php 

        $json = file_get_contents('http://www.floatrates.com/daily/clp.json');

        $array = json_decode($json);
        $urlPoster=array();
        foreach ($array as $value) {
            $urlPoster[$value->code]=$value;
        }
        $usd = $urlPoster['USD']->rate;
        $nusd = $urlPoster['USD']->name;

        $eur = $urlPoster['EUR']->rate;
        $neur = $urlPoster['EUR']->name;

        $mxn = $urlPoster['MXN']->rate;
        $nmxn = $urlPoster['MXN']->name;

        $ars = $urlPoster['ARS']->rate;
        $nars = $urlPoster['ARS']->name;

        $pen = $urlPoster['PEN']->rate;
        $npen = $urlPoster['PEN']->name;
    
?>

<?php 

    function CalculoDivisa($amount, $to_currency,$usd,$eur,$mxn,$ars,$pen,$nusd,$neur,$nmxn,$nars,$npen){

        
        if ($to_currency == "USD"):

            $valor_usd = round($amount * $usd,2);
            echo "$nusd:  $$valor_usd";

        elseif ($to_currency == "EUR"):

            $valor = round($amount * $eur,2);
            echo "$neur:  $$valor";
        
        elseif ($to_currency == "MXN"):

            $valor = round($amount * $mxn,2);
            echo "$nmxn:  $$valor";

        elseif ($to_currency == "ARS"):

            $valor = round($amount * $ars,2);
            echo "$nars:  $$valor";

        elseif ($to_currency == "PEN"):

            $valor = round($amount * $pen,2);
            echo "$npen:  $$valor";

        endif;
    }
?>


