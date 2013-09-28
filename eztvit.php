<link rel="stylesheet" type="text/css" href="xmad.css" media="all" />
<?php 
		$url = 'http://'.$_GET["url"];
 		$feed = file_get_contents($url);
		$xml = new SimpleXmlElement($feed);
		 echo "<br>";
			foreach ($xml->channel->item as $entry){
				$namespaces = $entry->getNameSpaces(true);
 				$dtitle = $entry->title;
				$dtarget = $entry->torrent->magnetURI;
   echo "<a href='".$dtarget."' title='Download ".$dtitle." via magnet link'>".$dtitle."</a><br>"; 
  
	} 
?>


