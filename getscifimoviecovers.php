<link rel="stylesheet" type="text/css" href="xmad.css" media="all" />
	<?php
    $url = "http://feed43.com/scifiitunes.xml";
$rss = simplexml_load_file($url);
if($rss)
{
$items = $rss->channel->item;
foreach($items as $item)
{
$title = $item->title;
$image = $item->link;
$description = $item->description;
echo '<div class="moviepostercont"><div class="movieposter" style="background-image:url('.$image.')"></div><a class="recents" href="#'.$title.'"title="click to download '.$title.'">'.$title.'</a></div>';
}
}

?>