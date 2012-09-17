<?php

require_once('functions.php');

if( $_REQUEST["searchq"] )
{
   $searchq = $_REQUEST['searchq'];
   echo "<h2>Download ". $searchq."</h2>";
   echo "<br>";
   
writerecents($searchq); 
	
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
 
  if ($searchq == "Top Seeded Music") {
	 $urlconstructor = 'http://thepiratebay.se/top/101';
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
	

?>
