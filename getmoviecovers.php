<link rel="stylesheet" type="text/css" href="xmad.css" media="all" />
<?php
$url = "http://www.blockbuster.com/rss/top100";
$rss = simplexml_load_file($url);
if($rss)
{
$items = $rss->channel->item;
foreach($items as $item)
{
$title = $item->title;
$image = $item->enclosure['url'];
$description = $item->description;
echo '<div class="moviepostercont"><div class="movieposter" style="background-image:url('.$image.')"></div><a class="recents" href="#'.$title.'"title="click to download '.$title.'">'.$title.'</a></div>';
}
}
?>

