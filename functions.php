<?php

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
function readerecents(){
 	$searches = simplexml_load_file("latestsearches.xml") 
       or die("Error: Cannot create object");	   
foreach($searches->children() as $child)
{  
	  echo '<li><a class="recents" href="#'.$child->searchstring.'">'.$child->searchstring.'</a></li>';
	}
}

function writerecents($searchq) {
$date = new DateTime();
$dateunixstyle = $date->format('U');  
$xml = simplexml_load_file("latestsearches.xml");  
$sxe = new SimpleXMLElement($xml->asXML()); 
$search = $sxe->addChild("search"); 
$search->addChild("searchstring", $searchq); 
$search->addChild("timestamp", $dateunixstyle); 
$sxe->asXML("latestsearches.xml"); 
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