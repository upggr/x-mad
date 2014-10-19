<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); 
function gettopsharedfiles() {
$xml = simplexml_load_file("topstuff.xml");
foreach ($xml->toplist as $toplist) {
	$url= $toplist->url;
	$title = $toplist->attributes()->title; 
echo '<li><a  class="recents" href="#'.$title.'">'.$title.'</a></li>';
}
}

function generateMenu()
{
	$menu = simplexml_load_file("menu.xml");
	foreach($menu->children() as $child)
	{
		echo '<li><a href="#' . $child->title . '" class="'. $child->classes .'">' . $child->title . '</a>';
		echo '<ul class="sub_menu">';
		foreach($child->children() as $grandchild)
		{
			if(!empty($grandchild->title))
			{
				echo '<li><a href="#' . $grandchild->title . '" url="' . $grandchild->url . '" class="'.$grandchild->classes.'">' . $grandchild->title . '</a></li>';
				
			}
		}echo "</ul>";
	}echo '<li>';
}


function readpornxml($url){
 	$searches = simplexml_load_file($url) 
       or die("Error: Cannot create object");
	foreach($searches->channel->item as $chan) {  
    $thetitle = $chan->title;
$codeblock = $chan->description;     
 if(preg_match('/src="([^"]+)"/', $codeblock, $match2))  ; 
   $theimage = $match[1];    
  // echo $theimage;
 if(preg_match('~iframe.*src="([^"]*)"~', $codeblock, $match2))  ; 
	 $thevideo = $match2[1];  	
	 echo '<iframe src="'.$thevideo.'"></iframe>';
}  
}
	   	   
function fetchxmllinksforporn($target) {
$html = file_get_contents($target);
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
for ($i = 0; $i < $hrefs->length; $i++) {

       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
	  if ((strpos($url,'xml') !== false)) { 

       echo '<li><a href="porn.php?graburl='.$url.'">'.basename($url,".xml").'</a></li>';
	  }
}

}


function writerecents($searchq) {
//$date = new DateTime();
//$dateunixstyle = $date->format('U');  
//$xml = simplexml_load_file("latestsearches.xml");  
//$sxe = new SimpleXMLElement($xml->asXML()); 
//$search = $sxe->addChild("search"); 
//$search->addChild("searchstring", $searchq); 
//$search->addChild("timestamp", $dateunixstyle); 
//$sxe->asXML("latestsearches.xml"); 
}

	function scrapmagnetsite($theurl) {
$var = fread_url($theurl);  
//	$var =	gzdecode2(file_get_contents($theurl));

	//	echo $var;
	//	echo    $theurl;
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                    $var, $matches);   												    
    $matches = $matches[1];
//	print_r($matches);
    $list = array();
	$i =0;
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
	if ($i < 8) {
	$sUrl = file_get_contents('http://api.adf.ly/api.php?key=9a283dafe534bddccc556153a37ed678&uid=1608068&advert_type=int&domain=go.x-mad.com&url='.$dtarget.'');
 
   echo '<a href="'.$sUrl.'" title="Download '.$dtitle.' via magnet link">'.$dtitle.'</a><br>'; 
	}
	else {
		echo '<a href="'.$dtarget.'" title="Download '.$dtitle.' via magnet link">'.$dtitle.'</a><br>'; 
	}
// echo '<a href="http://api.adf.ly/api.php?key=9a283dafe534bddccc556153a37ed678&uid=1608068&advert_type=int&domain=go.x-mad.com&url='.$dtarget.'" title="Download '.$dtitle.' via magnet link">'.$dtitle.'</a><br>';
 
$i++;
    }
	else {
	//	echo '?';
	}
	}
	}
		
	function fread_url($url,$ref="")
    {
        if(function_exists("curl_init")){
            $ch = curl_init();
            $user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3";
            $ch = curl_init();
          //  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_ENCODING , "gzip");
            curl_setopt( $ch, CURLOPT_HTTPGET, 1 );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
				if (!ini_get('safe_mode'))
		{
	//		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		}
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
	
	
	function graburl($url,$encoding) {
		$ref="";
		 if(function_exists("curl_init")){
            $ch = curl_init();
            $user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3";
            $ch = curl_init();
   //         curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_ENCODING , $encoding);
            curl_setopt( $ch, CURLOPT_HTTPGET, true );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				if (!ini_get('safe_mode'))
		{
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		}

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
	
	
	function scrapmagnets($theurl,$encoding) {
	$var = graburl($theurl,$encoding);    
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/",$var, $matches);   												    
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

	
function gzdecode2($data) { 
  $len = strlen($data); 
  if ($len < 18 || strcmp(substr($data,0,2),"\x1f\x8b")) { 
    return null;  // Not GZIP format (See RFC 1952) 
  } 
  $method = ord(substr($data,2,1));  // Compression method 
  $flags  = ord(substr($data,3,1));  // Flags 
  if ($flags & 31 != $flags) { 
    // Reserved bits are set -- NOT ALLOWED by RFC 1952 
    return null; 
  } 
  // NOTE: $mtime may be negative (PHP integer limitations) 
  $mtime = unpack("V", substr($data,4,4)); 
  $mtime = $mtime[1]; 
  $xfl   = substr($data,8,1); 
  $os    = substr($data,8,1); 
  $headerlen = 10; 
  $extralen  = 0; 
  $extra     = ""; 
  if ($flags & 4) { 
    // 2-byte length prefixed EXTRA data in header 
    if ($len - $headerlen - 2 < 8) { 
      return false;    // Invalid format 
    } 
    $extralen = unpack("v",substr($data,8,2)); 
    $extralen = $extralen[1]; 
    if ($len - $headerlen - 2 - $extralen < 8) { 
      return false;    // Invalid format 
    } 
    $extra = substr($data,10,$extralen); 
    $headerlen += 2 + $extralen; 
  } 

  $filenamelen = 0; 
  $filename = ""; 
  if ($flags & 8) { 
    // C-style string file NAME data in header 
    if ($len - $headerlen - 1 < 8) { 
      return false;    // Invalid format 
    } 
    $filenamelen = strpos(substr($data,8+$extralen),chr(0)); 
    if ($filenamelen === false || $len - $headerlen - $filenamelen - 1 < 8) { 
      return false;    // Invalid format 
    } 
    $filename = substr($data,$headerlen,$filenamelen); 
    $headerlen += $filenamelen + 1; 
  } 


  $commentlen = 0; 
  $comment = ""; 
  if ($flags & 16) { 
    // C-style string COMMENT data in header 
    if ($len - $headerlen - 1 < 8) { 
      return false;    // Invalid format 
    } 
    $commentlen = strpos(substr($data,8+$extralen+$filenamelen),chr(0)); 
    if ($commentlen === false || $len - $headerlen - $commentlen - 1 < 8) { 
      return false;    // Invalid header format 
    } 
    $comment = substr($data,$headerlen,$commentlen); 
    $headerlen += $commentlen + 1; 
  } 

  $headercrc = ""; 
  if ($flags & 1) { 
    // 2-bytes (lowest order) of CRC32 on header present 
    if ($len - $headerlen - 2 < 8) { 
      return false;    // Invalid format 
    } 
    $calccrc = crc32(substr($data,0,$headerlen)) & 0xffff; 
    $headercrc = unpack("v", substr($data,$headerlen,2)); 
    $headercrc = $headercrc[1]; 
    if ($headercrc != $calccrc) { 
      return false;    // Bad header CRC 
    } 
    $headerlen += 2; 
  } 

  // GZIP FOOTER - These be negative due to PHP's limitations 
  $datacrc = unpack("V",substr($data,-8,4)); 
  $datacrc = $datacrc[1]; 
  $isize = unpack("V",substr($data,-4)); 
  $isize = $isize[1]; 

  // Perform the decompression: 
  $bodylen = $len-$headerlen-8; 
  if ($bodylen < 1) { 
    // This should never happen - IMPLEMENTATION BUG! 
    return null; 
  } 
  $body = substr($data,$headerlen,$bodylen); 
  $data = ""; 
  if ($bodylen > 0) { 
    switch ($method) { 
      case 8: 
        // Currently the only supported compression method: 
        $data = gzinflate($body); 
        break; 
      default: 
        // Unknown compression method 
        return false; 
    } 
  } else { 
    // I'm not sure if zero-byte body content is allowed. 
    // Allow it for now...  Do nothing... 
  } 

  // Verifiy decompressed size and CRC32: 
  // NOTE: This may fail with large data sizes depending on how 
  //       PHP's integer limitations affect strlen() since $isize 
  //       may be negative for large sizes. 
  if ($isize != strlen($data) || crc32($data) != $datacrc) { 
    // Bad format!  Length or CRC doesn't match! 
    return false; 
  } 
  return $data; 
} 

?>