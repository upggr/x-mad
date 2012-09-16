<?php
function getrecents() {
$file = "recent.txt";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
echo '<li><a class="recents" href="#'.$line.'">'.$line.'</a></li>';
}
}

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
	//load xml file
	$menu = simplexml_load_file("menu.xml");
//	echo "<ul>";
	//loop through top level menu items
	foreach($menu->children() as $child)
	{
		echo '<li><a href="#' . $child->title . '" class="'. $child->classes .'">' . $child->title . '</a>';
		echo '<ul class="sub_menu">';
		//loop through child items
		foreach($child->children() as $grandchild)
		{
			if(!empty($grandchild->title))
			{
				
				//display link with correct locaiton and title
				echo '<li><a href="#' . $grandchild->title . '" url="' . $grandchild->url . '" class="'.$grandchild->classes.'">' . $grandchild->title . '</a></li>';
				
			}
		}echo "</ul>";
	}echo '<li>';
//	echo "</ul>";
}

?>