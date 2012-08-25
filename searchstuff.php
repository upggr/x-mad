<?php


if( $_REQUEST["searchq"] )
{
   $searchq = $_REQUEST['searchq'];
   echo "<h2>Download ". $searchq."</h2>";
   echo "<br>";
   
   $myFile = "recent.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $searchq."\n";
	fwrite($fh, $stringData);
	fclose($fh);
	
 $urlconstructor = 'http://thepiratebay.se/search/'.$searchq.'/0/7/0';
 $urlconstructor = str_replace(" ", "+", $urlconstructor);
 if ($searchq == "Top Seeded Files") {
	 $urlconstructor = 'http://thepiratebay.se/top/all';
	 $urlconstructor2 = '';	 
 }
 
 if ($searchq == "Top Seeded Movies") {
	 $urlconstructor = 'http://thepiratebay.se/top/201';
	 $urlconstructor2 = '';	 
 }
 
  if ($searchq == "Top Seeded TV Shows") {
	 $urlconstructor = 'http://thepiratebay.se/top/205';
	 $urlconstructor2 = '';	 
 }
  if ($searchq == "Top Seeded Windows Applications") {
	 $urlconstructor = 'http://thepiratebay.se/top/301';
	 $urlconstructor2 = '';	 
 }
  if ($searchq == "Top Seeded OSX Applications") {
	 $urlconstructor = 'http://thepiratebay.se/top/302';
	 $urlconstructor2 = '';	 
 }
  if ($searchq == "Top Seeded PC Games") {
	 $urlconstructor = 'http://thepiratebay.se/top/401';
	 $urlconstructor2 = '';	 
 }
  if ($searchq == "Top Seeded Porn Movies") {
	 $urlconstructor = 'http://thepiratebay.se/top/501';
	 $urlconstructor2 = '';	 
 }
 $urlconstructor2 = 'http://fenopy.eu/search/'.$searchq.'.html?order=2';
 $urlconstructor2 = str_replace(" ", "+", $urlconstructor);
 
scrapmagnetsite($urlconstructor);
scrapmagnetsite($urlconstructor2);

    
}
	
	function scrapmagnetsite($theurl) {
		$var = fread_url($theurl);           
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                    $var, $matches);   					
						
	    
    $matches = $matches[1];
    $list = array();

    foreach($matches as $var)
    {    
	if (strpos($var,'magnet') !== false) {
    $dtarget= $var;
	$dtitle =  explode( '=', $dtarget );
	$dtitle =  $dtitle[2];
	$dtitle = str_replace("+", " ", $dtitle);
	$dtitle = str_replace("%5D", "]", $dtitle);
	$dtitle = str_replace("%5B", "[", $dtitle);
	$dtitle = str_replace("%28", "(", $dtitle);
	$dtitle = str_replace("%29", ")", $dtitle);
	$dtitle = str_replace("%26amp%3B", " ", $dtitle);
	$dtitle = str_replace("%40", "@", $dtitle);
	$dtitle = str_replace("%2", "-", $dtitle);
	$dtitle = substr($dtitle, 0, -3);
   echo "<a href='".$dtarget."' title='Download ".$dtitle." via magnet link'>".$dtitle."</a><br>"; 
    }
	}
	}
		
	function fread_url($url,$ref="")
    {
        if(function_exists("curl_init")){
            $ch = curl_init();
            $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; ".
                          "Windows NT 5.0)";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
            curl_setopt( $ch, CURLOPT_HTTPGET, 1 );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_REFERER, $ref );
            curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            $html = curl_exec($ch);
            curl_close($ch);
        }
        else{
            $hfile = fopen($url,"r");
            if($hfile){
                while(!feof($hfile)){
                    $html.=fgets($hfile,1024);
                }
            }
        }
        return $html;
    }
?>
