<link rel="stylesheet" type="text/css" href="xmad.css" media="all" />
<?php 
		$url = 'http://'.$_GET["url"];
 		$feed = file_get_contents($url);
		$xml = new SimpleXmlElement($feed);
		
			foreach ($xml->entry as $entry){
				$namespaces = $entry->getNameSpaces(true);
				$im = $entry->children($namespaces['im']);
 				$title = $im->name;
				$image = $im->image[2];
echo '<div class="moviepostercont"><div class="movieposter" style="background-image:url('.$image.')"></div><a class="recents" href="#'.$title.'"title="click to download '.$title.'">'.$title.'</a></div>';
	} 
?>
